<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

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
		$kategori = $this->M_admin->select_all('kategori')->result_array();
		$produk = $this->M_admin->select_select_join_2table_type('produk.nama as nama_produk, produk.harga, produk.gambar, produk.id, kategori.nama as nama_kategori', 'produk', 'kategori', 'produk.kategori = kategori.id', 'left')->result_array();

		$header = array(
			'page' => 'about',
			'kategori' => $kategori, 
		);

		$this->load->view('layout/header', $header);
		$this->load->view('about');
		$this->load->view('layout/footer');
	}
}
