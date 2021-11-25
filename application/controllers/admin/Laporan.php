<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
        $where = array('status' => 'done', );
		$data['transaksi'] = $this->M_admin->select_select_where_orderBy('*', 'transaksi', $where, 'create_at DESC')->result_array();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/laporan', $data);
		$this->load->view('admin/layout/footer');
	}
    public function cetak()
    {
        $where = array('status' => 'done', );
		$data['transaksi'] = $this->M_admin->select_select_where_orderBy('*', 'transaksi', $where, 'create_at DESC')->result_array();

		$this->load->view('admin/laporan_cetak', $data);
    }
}