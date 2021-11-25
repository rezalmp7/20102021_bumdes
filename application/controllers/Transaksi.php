<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();

        if($this->session->userdata('bumdes_status') != 'user_login')
        {
            redirect(base_url('login'));
        }

        $this->load->library('tripay');
		$this->load->model('M_admin');
	}
    public function index()
    {
        
		if($this->session->userdata('bumdes_id') != null)
		{
			$id_pelanggan = $this->session->userdata('bumdes_id');
		}
		else {
			$id_pelanggan = null;
		}

		
		$kategori = $this->M_admin->select_all('kategori')->result_array();
		$produk = $this->M_admin->select_select_join_2table_type('produk.nama as nama_produk, produk.harga, produk.gambar, produk.id, kategori.nama as nama_kategori', 'produk', 'kategori', 'produk.kategori = kategori.id', 'left')->result_array();
		$where_count = array('id_pelanggan' => $id_pelanggan );
		$count_cart = $this->M_admin->select_where('cart', $where_count)->num_rows();
		$count_wishlist = $this->M_admin->select_where('wishlist', $where_count)->num_rows();
		$cart = $this->M_admin->select_select_where_join_2table_type('cart.id as id_cart, cart.checked, produk.id as id_produk, cart.qty, produk.gambar, produk.nama, produk.harga', 'cart', 'produk', 'cart.id_produk = produk.id', array('cart.id_pelanggan' => $id_pelanggan), 'left')->result_array();
		$wishlist = $this->M_admin->select_select_where_join_2table_type('wishlist.id as id_wishlist, produk.id as id_produk, produk.gambar, produk.nama, produk.harga', 'wishlist', 'produk', 'wishlist.id_produk = produk.id', array('wishlist.id_pelanggan' => $id_pelanggan), 'left')->result_array();

		$header = array(
			'page' => 'daftar',
			'kategori' => $kategori, 
			'count_cart' => $count_cart,
			'count_wishlist' => $count_wishlist,
			'cart' => $cart,
			'wishlist' => $wishlist
		);

        $id_pelanggan = $this->session->userdata('bumdes_id');

        $where_transaksi = array('id_pelanggan' => $id_pelanggan, );
        $data['transaksi'] = $this->M_admin->select_select_where_orderBy('*', 'transaksi', $where_transaksi, 'create_at DESC')->result_array();

        $data['pesanan'] = array();
        foreach ($data['transaksi'] as $a) {
            $id_transaksi = $a['id'];
            $where_pesanan = array('id_transaksi' => $id_transaksi, );
            $data['pesanan'][$id_transaksi] = $this->M_admin->select_all('pesanan', $where_pesanan)->result_array();
        }

        $this->load->view('layout/header', $header);
        $this->load->view('transaksi', $data);
        $this->load->view('layout/footer');
    }
    public function create_transaksi()
    {
        $post = $this->input->post();

        $cek_max_id = $this->M_admin->select_select('max(id) as max_id', 'transaksi')->row_array();

        if($cek_max_id['max_id'] == null)
        {
            $id_transaki = 1;
        }
        else {
            $id_transaki = $cek_max_id['max_id']+1;
        }
        $id_pelanggan = $this->session->userdata('bumdes_id');

        if($post['pengiriman'] == 'cod')
        {
            $data_transaksi = array(
                'id' => $id_transaki,
                'ref' => $id_transaki,
                'reference' => null,
                'id_pelanggan' =>  $id_pelanggan,
                'nama_penerima' => $post['nama_penerima'],
                'nohp_penerima' => $post['nomor_penerima'],
                'alamat_penerima' => $post['alamat_penerima'],
                'note' => $post['note'],
                'sub_harga' => $post['sub_harga'],
                'admin' => $post['admin'],
                'total_harga' => $post['total_harga'],
                'metode_pembayaran' => $post['payment'],
                'metode_pengiriman' => $post['pengiriman'],
                'expired_at' => null
            );
            $this->M_admin->insert_data('transaksi', $data_transaksi);
            $this->M_admin->delete_data('cart', ['id_pelanggan' => $id_pelanggan, 'checked' => 'check']);
            $i = 0;
            foreach ($post['id_produk'] as $a) {
                $data_pesanan = array(
                    'id_transaksi' => $id_transaki,
                    'id_produk' => $post['id_produk'][$i],
                    'qty' => $post['qty'][$i],
                    'harga' => $post['harga_produk'][$i]
                );
                $this->M_admin->insert_data('pesanan', $data_pesanan);
                $i++;
            }
            $this->session->set_flashdata('success', "Transaksi Berhasil");
            redirect(base_url('transaksi/detail/'.$id_transaki));
        }
        else
        {
            $create_transaksi = $this->tripay->create_transaksi($id_transaki, $post['payment'], $post['nama_penerima'], $post['nomor_penerima'], $post['id_produk'], $post['nama_produk'], $post['qty'], $post['harga_produk'], $post['sub_harga']);

            if($create_transaksi->success)
            {
                $data_transaksi = array(
                    'id' => $id_transaki,
                    'ref' => $id_transaki,
                    'reference' => $create_transaksi->data->reference,
                    'id_pelanggan' =>  $id_pelanggan,
                    'nama_penerima' => $post['nama_penerima'],
                    'nohp_penerima' => $post['nomor_penerima'],
                    'alamat_penerima' => $post['alamat_penerima'],
                    'note' => $post['note'],
                    'sub_harga' => $post['sub_harga'],
                    'admin' => $post['admin'],
                    'total_harga' => $post['total_harga'],
                    'metode_pembayaran' => $post['payment'],
                    'metode_pengiriman' => $post['pengiriman'],
                    'expired_at' => date("Y-m-d H:i:s", strtotime('+24 hours'))
                );
                $this->M_admin->insert_data('transaksi', $data_transaksi);
                $this->M_admin->delete_data('cart', ['id_pelanggan' => $id_pelanggan, 'checked' => 'check']);
                $i = 0;
                foreach ($post['id_produk'] as $a) {
                    $data_pesanan = array(
                        'id_transaksi' => $id_transaki,
                        'id_produk' => $post['id_produk'][$i],
                        'qty' => $post['qty'][$i],
                        'harga' => $post['harga_produk'][$i]
                    );
                    $this->M_admin->insert_data('pesanan', $data_pesanan);
                    $i++;
                }
                $this->session->set_flashdata('success', "Transaksi Berhasil");
                redirect(base_url('transaksi/detail/'.$id_transaki));
            }
            else {
                $this->session->set_flashdata('success', "Transaksi Gagal");
                redirect(base_url('checkout'));
            }

        }
    }
    public function detail($id)
    {
        $get = $this->input->get();

        $id_transaksi = $id;
        
        if($this->session->userdata('bumdes_id') != null)
		{
			$id_pelanggan = $this->session->userdata('bumdes_id');
		}
		else {
			$id_pelanggan = null;
		}
		
		$kategori = $this->M_admin->select_all('kategori')->result_array();
		$produk = $this->M_admin->select_select_join_2table_type('produk.nama as nama_produk, produk.harga, produk.gambar, produk.id, kategori.nama as nama_kategori', 'produk', 'kategori', 'produk.kategori = kategori.id', 'left')->result_array();
		$where_count = array('id_pelanggan' => $id_pelanggan );
		$count_cart = $this->M_admin->select_where('cart', $where_count)->num_rows();
		$count_wishlist = $this->M_admin->select_where('wishlist', $where_count)->num_rows();
		$cart = $this->M_admin->select_select_where_join_2table_type('cart.id as id_cart, cart.checked, produk.id as id_produk, cart.qty, produk.gambar, produk.nama, produk.harga', 'cart', 'produk', 'cart.id_produk = produk.id', array('cart.id_pelanggan' => $id_pelanggan), 'left')->result_array();
		$wishlist = $this->M_admin->select_select_where_join_2table_type('wishlist.id as id_wishlist, produk.id as id_produk, produk.gambar, produk.nama, produk.harga', 'wishlist', 'produk', 'wishlist.id_produk = produk.id', array('wishlist.id_pelanggan' => $id_pelanggan), 'left')->result_array();

		$header = array(
			'page' => 'daftar',
			'kategori' => $kategori, 
			'count_cart' => $count_cart,
			'count_wishlist' => $count_wishlist,
			'cart' => $cart,
			'wishlist' => $wishlist
		);

        $id_pelanggan = $this->session->userdata('bumdes_id');

        $where_transaksi = array('id' => $id_transaksi );
        $data['transaksi'] = $this->M_admin->select_where('transaksi', $where_transaksi)->row_array();
        
        if($data['transaksi']['reference'] != null)
        {
            $tripay = $this->tripay->detail_transaksi($data['transaksi']['reference']);
            $data['data_tripay'] = $tripay->data;
        }

        $where_pesanan = array('id_transaksi' => $id_transaksi, );
        $data['pesanan'] = $this->M_admin->select_select_where_join_2table_type('produk.gambar, produk.nama, produk.harga, pesanan.qty', 'pesanan', 'produk', 'pesanan.id_produk = produk.id', $where_pesanan, 'left')->result_array();

        $this->load->view('layout/header', $header);
        $this->load->view('transaksi_detail', $data);
        $this->load->view('layout/footer');
    }
}
