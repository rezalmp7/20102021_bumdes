<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umkm extends CI_Controller {

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

        /*
        if($this->session->userdata('status') != 'login_admin')
        {
			$this->session->set_flashdata('error', "Login Terlebih Dahulu");
            redirect(base_url('admin/login'));
        }
        */

		$this->load->model('M_admin');
	}
	public function index()
	{
        $umkm = $this->M_admin->select_all('umkm')->result_array();

        $data = array('umkm' => $umkm );

		$this->load->view('admin/layout/header');
		$this->load->view('admin/umkm', $data);
		$this->load->view('admin/layout/footer');
	}
    public function tambah()
	{

		$this->load->view('admin/layout/header');
		$this->load->view('admin/umkm_tambah');
		$this->load->view('admin/layout/footer');
	}
    public function tambah_aksi()
    {
        $post = $this->input->post();

        $data = array(
            'nama' => $post['nama'], 
            'alamat' => $post['alamat'], 
            'phone' => $post['nohp'] 
        );

        $this->M_admin->insert_data('umkm', $data);

        redirect(base_url('admin/umkm'));
    }
	public function edit($id)
	{
		$where = array('id' => $id, );

		$data['umkm'] = $this->M_admin->select_where('umkm', $where)->row_array();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/umkm_edit', $data);
		$this->load->view('admin/layout/footer');
	}
	public function edit_aksi()
	{
		$post = $this->input->post();

		$set = array(
			'nama' => $post['nama'],
			'alamat' => $post['alamat'],
			'phone' => $post['nohp'] 
		);
		$where = array('id' => $post['id']);

		$this->M_admin->update_data('umkm', $set, $where);
		
        redirect(base_url('admin/umkm'));
	}
	public function hapus($id)
	{
		$where = array('id' => $id, );

		$this->M_admin->delete_data('umkm', $where);

		redirect(base_url('admin/umkm'));
	}
}
