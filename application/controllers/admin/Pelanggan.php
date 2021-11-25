<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

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
		$data['pelanggan'] = $this->M_admin->select_all('pelanggan')->result_array();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/pelanggan', $data);
		$this->load->view('admin/layout/footer');
	}
	public function tambah()
	{
		$this->load->view('admin/layout/header');
		$this->load->view('admin/pelanggan_tambah');
		$this->load->view('admin/layout/footer');
	}
	public function tambah_aksi()
	{
		$post = $this->input->post();

		$password = md5($post['password']);

        $data = array(
            'nama' => $post['nama'],
            'jenkel' => $post['jenkel'],
            'tgl_lahir' => $post['tgl_lahir'],
            'alamat' => $post['alamat'],
            'no_hp' => $post['nohp'],
            'username' => $post['username'],
            'password' => $password
        );

		$this->M_admin->insert_data('pelanggan', $data);

		redirect(base_url('admin/pelanggan'));
	}
	public function edit($id)
	{
		$where = array('id' => $id, );
		$data['pelanggan'] = $this->M_admin->select_where('pelanggan', $where)->row_array();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/pelanggan_edit', $data);
		$this->load->view('admin/layout/footer');
	}
	function edit_aksi()
	{
		$post = $this->input->post();

		if($post['password'] == null)
		{
			$password = $post['password_lama'];
		}
		else {
			$password = md5($post['password']);
		}

		$set = array(
			'nama' => $post['nama'],
            'jenkel' => $post['jenkel'],
            'tgl_lahir' => $post['tgl_lahir'],
            'alamat' => $post['alamat'],
            'no_hp' => $post['nohp'],
            'username' => $post['username'],
            'password' => $password
		);

		$where = array('id' => $post['id'], );

		$this->M_admin->update_data('pelanggan', $set, $where);

		redirect(base_url('admin/pelanggan'));
	}
	function hapus($id)
	{
		$where = array('id' => $id, );

		$this->M_admin->delete_data('pelanggan', $where);

		redirect(base_url('admin/pelanggan'));
	}
}
