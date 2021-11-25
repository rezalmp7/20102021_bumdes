<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$cart = $this->M_admin->select_select_where_join_2table_type('cart.id as id_cart, cart.checked, produk.id as id_produk, cart.qty, produk.gambar, produk.nama, produk.harga', 'cart', 'produk', 'cart.id_produk = produk.id', array('cart.id_pelanggan' => $id_pelanggan), 'left')->result_array();
		$wishlist = $this->M_admin->select_select_where_join_2table_type('wishlist.id as id_wishlist, produk.id as id_produk, produk.gambar, produk.nama, produk.harga', 'wishlist', 'produk', 'wishlist.id_produk = produk.id', array('wishlist.id_pelanggan' => $id_pelanggan), 'left')->result_array();

		$header = array(
			'page' => 'home',
			'kategori' => $kategori, 
			'count_cart' => $count_cart,
			'count_wishlist' => $count_wishlist,
			'cart' => $cart,
			'wishlist' => $wishlist
		);

		

		$this->load->view('layout/header', $header);
		$this->load->view('login');
		$this->load->view('layout/footer');
	}
	function aksi_login()
	{
		$post = $this->input->post();

        $password = md5($post['password']);

        $where_cek = array(
            'username' => $post['username'],
            'password' => $password 
        );

        $sql = $this->M_admin->select_where('pelanggan', $where_cek);
        $status = 'user_login';
        
        $cek_num = $sql->num_rows();
        $cek_row = $sql->row_array();

        if($cek_num > 0)
        {

            $data_session = array(
				'bumdes_status' => $status,
				'bumdes_nama' => $cek_row['nama'],
				'bumdes_id' => $cek_row['id'],
                'bumdes_username' => $cek_row['username']
			);
			$this->session->set_userdata($data_session);

            $this->session->set_flashdata('success', "Login Berhasil");
			redirect(base_url('home'));
        }
        else {
            $this->session->set_flashdata('error', "Login Gagal");
			redirect(base_url('login'));
        }
	}
    function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', "Berhasil Keluar dari sistem");
		redirect(base_url());
    }
}
