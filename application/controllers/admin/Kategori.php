<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

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
        $data['kategori'] = $this->M_admin->select_all('kategori')->result_array();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/kategori', $data);
		$this->load->view('admin/layout/footer');
	}
    public function tambah()
    {
        $this->load->view('admin/layout/header');
		$this->load->view('admin/kategori_tambah');
		$this->load->view('admin/layout/footer');
    }
    public function tambah_aksi()
    {
        $post = $this->input->post();

        $data = array(
            'nama' => $post['nama'], 
        );

        $this->M_admin->insert_data('kategori', $data);

        redirect(base_url('admin/kategori'));
    }
    public function edit($id)
    {
        $where = array('id' => $id, );

        $data['kategori'] = $this->M_admin->select_where('kategori', $where)->row_array();

        $this->load->view('admin/layout/header');
		$this->load->view('admin/kategori_edit', $data);
		$this->load->view('admin/layout/footer');
    }
    public function edit_aksi()
    {
        $post = $this->input->post();

        $set = array(
            'nama' => $post['nama'], 
        );
        $where = array('id' => $post['id'], );

        $this->M_admin->update_data('kategori', $set, $where);

        redirect(base_url('admin/kategori'));
    }
    public function hapus($id)
    {
        $where = array('id' => $id, );

        $this->M_admin->delete_data('kategori', $where);

        redirect(base_url('admin/kategori'));
    }
}
