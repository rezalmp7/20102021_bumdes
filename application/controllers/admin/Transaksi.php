<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

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
		$data['transaksi'] = $this->M_admin->select_select_orderBy('*', 'transaksi', 'create_at DESC')->result_array();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/transaksi', $data);
		$this->load->view('admin/layout/footer');
	}
    public function proses($id)
    {
        $where = array('id' => $id, );
        $set = array(
            'status' => 'process', 
            'process_at' => date('Y-m-d H:i:s')
        );
        $this->M_admin->update_data('transaksi', $set, $where);

        $this->session->set_flashdata('success', "Barang Diprocess");
        redirect(base_url('admin/transaksi'));
    }
	public function detail($id)
	{
		$where = array('transaksi.id' => $id, );
		$data['transaksi'] = $this->M_admin->select_select_where_join_2table_type_orderBy('transaksi.*, pelanggan.nama as nama_pelanggan', 'transaksi', 'pelanggan', 'transaksi.id_pelanggan = pelanggan.id', $where, 'left', 'transaksi.id DESC')->row_array();

		$where_pesanan = array('pesanan.id_transaksi' => $id, );
		$data['pesanan'] = $this->M_admin->select_select_where_join_2table_type_orderBy('produk.*, pesanan.qty', 'pesanan', 'produk', 'pesanan.id_produk = produk.id', $where_pesanan, 'left', 'pesanan.id DESC')->result_array();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/transaksi_detail', $data);
		$this->load->view('admin/layout/footer');
	}
    public function done($id)
    {
        $where = array('id' => $id, );
        $set = array(
            'status' => 'done', 
            'done_at' => date('Y-m-d H:i:s')
        );
        $this->M_admin->update_data('transaksi', $set, $where);

        $this->session->set_flashdata('success', "Transaksi Berhasil");
        redirect(base_url('admin/transaksi'));
    }
}