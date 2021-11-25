<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

		if($this->session->userdata('status') != 'login_admin')
        {
            redirect(base_url('admin/login'));
        }

		$this->load->model('M_admin');
	}
	public function index()
	{
		
		$data = array(
			'page' => 'dashboard', 
			'count_transaksi' => $this->M_admin->select_all('transaksi')->num_rows(),
			'count_pelanggan' => $this->M_admin->select_all('pelanggan')->num_rows(),
			'count_umkm' => $this->M_admin->select_all('umkm')->num_rows(),
			'count_produk' => $this->M_admin->select_all('produk')->num_rows()
		);
		
		$data['transaksi'] = $this->M_admin->select_query("SELECT * FROM transaksi WHERE status != 'done' AND status != 'cancel' ORDER BY create_at ASC")->result_array();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/layout/footer');
	}
}
