<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

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

		$header = array(
			'page' => 'daftar', 
		);

		$this->load->view('layout/header', $header);
		$this->load->view('daftar');
		$this->load->view('layout/footer');
	}
	function daftar_aksi()
	{
		$post = $this->input->post();

		$where_cek_username = array('username' => $post['username'], );
		$cek_username = $this->M_admin->select_where('pelanggan', $where_cek_username)->num_rows();

		$password = $post['password'];
		if($cek_username > 0)
		{
			$this->session->set_flashdata('error', "Pendaftaran Gagal Username Terpakai");
			redirect(base_url('daftar'));
		}
		else {
			$data_regist = array(
				'nama' => $post['nama'],
				'jenkel' => $post['jenkel'],
				'alamat' => $post['alamat'],
				'no_hp' => $post['no_hp'],
				'username' => $post['username'],
				'password' => md5($password)
			);

			$this->M_admin->insert_data('pelanggan', $data_regist);

			$this->session->set_flashdata('success', "Pendaftaran Berhasil");
			redirect(base_url('login'));
		}
	}
}
