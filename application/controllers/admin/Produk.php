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
		$data['produk'] = $this->M_admin->select_select_join_3table_type('produk.id, produk.nama, umkm.nama as nama_umkm, kategori.nama as nama_kategori, produk.harga, produk.gambar, produk.stok', 'produk', 'umkm', 'produk.umkm = umkm.id', 'left', 'kategori', 'produk.kategori = kategori.id', 'left')->result_array();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/produk', $data);
		$this->load->view('admin/layout/footer');
	}
	public function tambah()
	{
		$data['umkm'] = $this->M_admin->select_all('umkm')->result_array();
		$data['kategori'] = $this->M_admin->select_all('kategori')->result_array();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/produk_tambah', $data);
		$this->load->view('admin/layout/footer');
	}
	function upload_foto($nama_file){
		$config['upload_path']          = './assets/img/produk/';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['file_name']            = $nama_file;
	    $config['overwrite']			= true;
		$config['max_size']             = 1500;
 
		$this->load->library('upload', $config);
        $this->upload->initialize($config);

		if ( ! $this->upload->do_upload('gambar')){ 
			$error = $this->upload->display_errors();
			echo $error;
			return 'false';
		}else{
			$data = $this->upload->data('file_name');
			echo $nama_file."<br><pre>";
			print_r($this->upload->data());
			echo "<pre>";
			return $data;
		}
	}
	public function tambah_aksi()
	{
		$post = $this->input->post();

		$select_max_id = $this->M_admin->select_select('max(id) as max_id', 'produk')->row_array();

		if($select_max_id != null)
		{
			$id = $select_max_id['max_id']+1;
		}
		else {
			$id = 1;
		}

		$nama_gambar = 'produk_'.$id;
		$gambar = $this->upload_foto($nama_gambar);

		if($gambar != 'false')
		{
			$data = array(
				'id' => $id,
				'nama' => $post['nama'],
				'kategori' => $post['kategori'],
				'umkm' => $post['umkm'],
				'harga' => $post['harga'],
				'gambar' => $gambar,
				'deskripsi' => $post['deskripsi'],
				'stok' => $post['stok'] 
			);

			$this->M_admin->insert_data('produk', $data);

			$this->session->set_flashdata('success', "Produk berhasil ditambahkan");
			redirect(base_url('admin/produk'));
		}
		else {
			$this->session->set_flashdata('error', "Gambar Gagal Terupload");
			redirect(base_url('admin/produk/tambah'));
		}
	}
	public function edit($id)
	{
		$where = array('id' => $id, );
		$data['produk'] = $this->M_admin->select_where('produk', $where)->row_array();
		$data['umkm'] = $this->M_admin->select_all('umkm')->result_array();
		$data['kategori'] = $this->M_admin->select_all('kategori')->result_array();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/produk_edit', $data);
		$this->load->view('admin/layout/footer');
	}
	public function edit_aksi()
	{
		$post = $this->input->post();

		if ($_FILES['gambar']['size'] != 0)
		{
			$nama_gambar = 'produk_'.$post['id'];
			$gambar = $this->upload_foto($nama_gambar);
		}
		else {
			$gambar = $post['gambar_lama'];
		}

		if($gambar != 'false')
		{
			$set = array(
				'nama' => $post['nama'],
				'kategori' => $post['kategori'],
				'umkm' => $post['umkm'],
				'harga' => $post['harga'],
				'gambar' => $gambar,
				'deskripsi' => $post['deskripsi'],
				'stok' => $post['stok'] 
			);
			$where = array(
				'id' => $post['id'],
			);

			$this->M_admin->update_data('produk', $set, $where);

			$this->session->set_flashdata('success', "Produk berhasil diupdate");
			redirect(base_url('admin/produk'));
		}
		else {
			$this->session->set_flashdata('error', "Gambar Gagal Terupload");
			redirect(base_url('admin/produk/tambah'));
		}
	}
}