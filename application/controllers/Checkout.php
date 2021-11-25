<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

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
		$where_count = array('id_pelanggan' => $this->session->userdata('bumdes_id') );
		$count_cart = $this->M_admin->select_where('cart', $where_count)->num_rows();
		$count_wishlist = $this->M_admin->select_where('wishlist', $where_count)->num_rows();
		$cart = $this->M_admin->select_select_where_join_2table_type('cart.id as id_cart, cart.checked, produk.status, produk.id as id_produk, cart.qty, produk.gambar, produk.nama, produk.harga', 'cart', 'produk', 'cart.id_produk = produk.id', array('cart.id_pelanggan' => $id_pelanggan), 'left')->result_array();
		$wishlist = $this->M_admin->select_select_where_join_2table_type('wishlist.id as id_wishlist, produk.id as id_produk, produk.gambar, produk.nama, produk.harga', 'wishlist', 'produk', 'wishlist.id_produk = produk.id', array('wishlist.id_pelanggan' => $id_pelanggan), 'left')->result_array();

		$pelanggan = $this->M_admin->select_where('pelanggan', array('id' => $id_pelanggan))->row_array();
		foreach ($cart as $id_produk_fir)
        {
            if($id_produk_fir['status'] == 'kosong')
            {
                $this->session->set_flashdata('error', "Transaksi Gagal ada produk yang kosong");
                redirect(base_url('produk'));
            }
			else
			{
				$status = true;
			}
        }
		if($status == true)
		{
			$cart_body = $this->M_admin->select_select_where_join_2table_type('cart.id as id_cart, cart.checked, produk.status, produk.id as id_produk, cart.qty, produk.gambar, produk.nama, produk.harga', 'cart', 'produk', 'cart.id_produk = produk.id', array('cart.id_pelanggan' => $id_pelanggan, 'cart.checked' => 'check'), 'left')->result_array();

			$header = array(
				'page' => 'daftar',
				'kategori' => $kategori, 
				'count_cart' => $count_cart,
				'count_wishlist' => $count_wishlist,
				'cart' => $cart,
				'cart_body' => $cart_body,
				'wishlist' => $wishlist,
				'pelanggan' => $pelanggan
			);

			$data['channel_pembayaran'] = $this->tripay->all_channel();

			$this->load->view('layout/header', $header);
			$this->load->view('checkout', $data);
			$this->load->view('layout/footer');
		}
    }
    public function coba_library()
    {
       $this->tripay->all_channel();
    }
    public function update_cart()
    {
        $post = $this->input->post();

        $i = 0;
        foreach ($post['id'] as $a) {
            $where = array('id' => $post['id'][$i], );
            $set = array('qty' => $post['qty'][$i], );

            $this->M_admin->update_data('cart', $set, $where);

            $i++;
        }

        redirect(base_url('checkout'));
    }
	public function detail_metode()
	{
		$get = $this->input->get();
		$id = $get['id'];
		$detail_channel = $this->tripay->detail_channel($id);

		echo $detail_channel;
	}
}
