<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		//cek expired transaksi
		$transaksi = $this->M_admin->select_where('transaksi', ['expired_at <' => date('Y-m-d H:i:s'), 'status' => 'unpaid'])->result_array();
		foreach($transaksi as $trans)
		{
			$id_transaksi = $trans['id'];
			$this->M_admin->update_data('transaksi', ['status' => 'expired'], ['id' => $id_transaksi]);
		}

		if($this->session->userdata('bumdes_id') != null)
		{
			$id_pelanggan = $this->session->userdata('bumdes_id');
		}
		else {
			$id_pelanggan = null;
		}
		
		$kategori = $this->M_admin->select_all('kategori')->result_array();
		$produk = $this->M_admin->select_select_join_2table_type_limit_orderBy('produk.nama as nama_produk, produk.harga, produk.gambar, produk.id, kategori.nama as nama_kategori, produk.status', 'produk', 'kategori', 'produk.kategori = kategori.id', 'left', 6, 'produk.create_at DESC')->result_array();
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

		$data = array(
			'kategori' => $kategori,
			'produk' => $produk
		);

		$this->load->view('layout/header', $header);
		$this->load->view('home', $data);
		$this->load->view('layout/footer');
	}
}
