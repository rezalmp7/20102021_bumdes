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

		if($this->session->userdata('status') != 'login_admin')
        {
            redirect(base_url('admin/login'));
        }

		$this->load->model('M_admin');
	}
	public function index()
	{
		$data['produk'] = $this->M_admin->select_select_join_3table_type('produk.id, produk.nama, umkm.nama as nama_umkm, kategori.nama as nama_kategori, produk.harga, produk.gambar, produk.status', 'produk', 'umkm', 'produk.umkm = umkm.id', 'left', 'kategori', 'produk.kategori = kategori.id', 'left')->result_array();

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
				'status' => $post['status'] 
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
				'status' => $post['status'] 
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
	public function hapus($id)
	{
		$cek_pesanan = $this->M_admin->select_where('pesanan', array('id_produk' => $id))->num_rows();

		if($cek_pesanan > 0)
		{
			$this->session->set_flashdata('error', "Produk ada dalam transaksi pelanggan");
			redirect(base_url('admin/produk'));
		}
		else {
			$where = array('id' => $id, );
			$this->M_admin->delete_data('produk', $where);
			$this->M_admin->delete_data('cart', array('id_produk' => $id));
			$this->M_admin->delete_data('wishlist', array('id_produk' => $id));
			
			$this->session->set_flashdata('success', "Produk berhasil dihapus");
			redirect(base_url('admin/produk'));
		}
	}
	public function detail($id)
	{
		$where_produk = array('produk.id' => $id, );
		$data['produk'] = $this->M_admin->select_select_where_join_3table_type_orderBy('produk.*, kategori.nama as nama_kategori, umkm.nama as nama_umkm', 'produk', 'kategori', 'produk.kategori = kategori.id', 'left', 'umkm', 'umkm.id = produk.umkm', 'left', $where_produk, 'produk.create_at DESC')->row_array();
		
		$data['transaksi'] = $this->M_admin->select_select_where_join_2table_type_orderBy('pesanan.*, transaksi.reference, transaksi.id as id_transaksi, transaksi.status', 'pesanan', 'transaksi', 'pesanan.id_transaksi = transaksi.id', array('pesanan.id_produk' => $id, ), 'left', 'transaksi.create_at DESC')->result_array();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/produk_detail', $data);
		$this->load->view('admin/layout/footer');
	}
	function ganti_status($id)
	{
		$where_produk = array(
			'id' => $id, 
		);
		$produk = $this->M_admin->select_where('produk', $where_produk)->row_array();

		if($produk['status'] == 'kosong')
		{
			$set = array('status' => 'ada', );
		}
		else
		{
			$set = array('status' => 'kosong', );
		}
		
		$this->M_admin->update_data('produk', $set, $where_produk);

		redirect(base_url('admin/produk'));
	}
}