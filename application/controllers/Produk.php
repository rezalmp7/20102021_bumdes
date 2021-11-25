<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

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
		$post = $this->input->post();

		if($this->session->userdata('bumdes_id') != null)
		{
			$id_pelanggan = $this->session->userdata('bumdes_id');
		}
		else {
			$id_pelanggan = null;
		}
		
		$kategori = $this->M_admin->select_all('kategori')->result_array();
		$where_count = array('id_pelanggan' => $this->session->userdata('bumdes_id') );
		$count_cart = $this->M_admin->select_where('cart', $where_count)->num_rows();
		$count_wishlist = $this->M_admin->select_where('wishlist', $where_count)->num_rows();
		$cart = $this->M_admin->select_select_where_join_2table_type('cart.id as id_cart, produk.id as id_produk, cart.qty, produk.gambar, produk.nama, produk.harga', 'cart', 'produk', 'cart.id_produk = produk.id', array('cart.id_pelanggan' => $id_pelanggan), 'left')->result_array();
		$wishlist = $this->M_admin->select_select_where_join_2table_type('wishlist.id as id_wishlist, produk.id as id_produk, produk.gambar, produk.nama, produk.harga', 'wishlist', 'produk', 'wishlist.id_produk = produk.id', array('wishlist.id_pelanggan' => $id_pelanggan), 'left')->result_array();
		if($post != null && $post['search'] == 'true')
		{
			$produk = $this->M_admin->select_select_join_2table_type_like('produk.nama as nama_produk, produk.harga, produk.gambar, produk.id, kategori.nama as nama_kategori, produk.status', 'produk', 'kategori', 'produk.kategori = kategori.id', 'left', array('produk.nama' => $post['search_name']))->result_array();
		}
		else
		{
			$post['search_name'] = null;
			$produk = $this->M_admin->select_select_join_2table_type('produk.nama as nama_produk, produk.harga, produk.gambar, produk.id, kategori.nama as nama_kategori, produk.status', 'produk', 'kategori', 'produk.kategori = kategori.id', 'left')->result_array();
		}

		$header = array(
			'page' => 'produk',
			'kategori' => $kategori, 
			'count_cart' => $count_cart,
			'count_wishlist' => $count_wishlist,
			'cart' => $cart,
			'wishlist' => $wishlist
		);


		$data = array(
			'kategori' => $kategori,
			'produk' => $produk,
			'search' => $post['search_name']
		);

		$this->load->view('layout/header', $header);
		$this->load->view('produk', $data);
		$this->load->view('layout/footer');
	}
    public function detail($id)
    {
        if($this->session->userdata('bumdes_id') != null)
		{
			$id_pelanggan = $this->session->userdata('bumdes_id');
		}
		else {
			$id_pelanggan = null;
		}
		
		$kategori = $this->M_admin->select_all('kategori')->result_array();
		$where_count = array('id_pelanggan' => $this->session->userdata('bumdes_id') );
		$count_cart = $this->M_admin->select_where('cart', $where_count)->num_rows();
		$count_wishlist = $this->M_admin->select_where('wishlist', $where_count)->num_rows();
		$cart = $this->M_admin->select_select_where_join_2table_type('cart.id as id_cart, cart.checked, produk.id as id_produk, cart.qty, produk.gambar, produk.nama, produk.harga', 'cart', 'produk', 'cart.id_produk = produk.id', array('cart.id_pelanggan' => $id_pelanggan), 'left')->result_array();
		$wishlist = $this->M_admin->select_select_where_join_2table_type('wishlist.id as id_wishlist, produk.id as id_produk, produk.gambar, produk.nama, produk.harga', 'wishlist', 'produk', 'wishlist.id_produk = produk.id', array('wishlist.id_pelanggan' => $id_pelanggan), 'left')->result_array();

		$header = array(
			'page' => 'produk',
			'kategori' => $kategori, 
			'count_cart' => $count_cart,
			'count_wishlist' => $count_wishlist,
			'cart' => $cart,
			'wishlist' => $wishlist
		);

		
		$data['rata_rata_rating'] = $this->M_admin->select_select_where('AVG(rating) as mean_rating', 'rating', array('rating.id_produk' => $id, ))->row_array();
		$data['count_rating'] = $this->M_admin->select_where('rating', array('id_produk' => $id))->num_rows();

		$where_rating = array(
			'rating.id_produk' => $id, 
		);
		$data['rating'] = $this->M_admin->select_select_where_join_2table_type_orderBy('rating.id, rating.rating, rating.comment, pelanggan.nama, rating.create_at', 'rating', 'pelanggan', 'rating.id_pelanggan = pelanggan.id', $where_rating, 'left', 'rating.create_at DESC')->result_array();

        $where_produk = array('id' => $id, );
        $data['produk'] = $this->M_admin->select_where('produk', $where_produk)->row_array();
		$where_kategori = array('id' => $data['produk']['kategori'], );
		$data['kategori_body'] = $this->M_admin->select_where('kategori', $where_kategori)->row_array();

        $this->load->view('layout/header', $header);
        $this->load->view('produk_detail', $data);
        $this->load->view('layout/footer');
    }
}
