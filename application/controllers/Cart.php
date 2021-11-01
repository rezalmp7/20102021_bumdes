<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

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

        if($this->session->userdata('bumdes_status') != 'user_login')
        {
            redirect(base_url('login'));
        }

		$this->load->model('M_admin');
	}
    function tambah_aksi()
    {
        $post = $this->input->post();
        $get = $this->input->get();
        
        $id_pelanggan = $this->session->userdata('bumdes_id');

        if($post != null)
        {
            $where_cek = array(
                'id_produk' => $post['id_produk'],
                'id_pelanggan' => $id_pelanggan 
            );
            $cek_cart = $this->M_admin->select_where('cart', $where_cek)->num_rows();

            if($cek_cart > 0)
            {
                $redirect_to = $get['from'];
                $this->session->set_flashdata('error', "Produk sudah ada dalam Cart");
			    redirect(base_url($redirect_to));
            }
            else {
                $data_insert = array(
                    'id_produk' => $post['id_produk'], 
                    'qty' => $post['qty'], 
                    'id_pelanggan' => $id_pelanggan, 
                );

                $this->M_admin->insert_data('cart', $data_insert);
                
                $redirect_to = $get['from'];
                $this->session->set_flashdata('success', "Produk Berhasil masuk dalam Cart");
                redirect(base_url($redirect_to));
            }
        }
        elseif($get != null)
        {
            $where_cek = array(
                'id_produk' => $get['id_produk'],
                'id_pelanggan' => $id_pelanggan 
            );
            $cek_cart = $this->M_admin->select_where('cart', $where_cek)->num_rows();

            if($cek_cart > 0)
            {
                $redirect_to = $get['from'];
                $this->session->set_flashdata('error', "Produk sudah ada dalam Cart");
			    redirect(base_url($redirect_to));
            }
            else {
                $data_insert = array(
                    'id_produk' => $get['id_produk'], 
                    'qty' => 1, 
                    'id_pelanggan' => $id_pelanggan, 
                );

                $this->M_admin->insert_data('cart', $data_insert);
                
                $redirect_to = $get['from'];
                $this->session->set_flashdata('success', "Produk Berhasil masuk dalam Cart");
                redirect(base_url($redirect_to));
            }
        }
        else {
            $this->session->set_flashdata('error', "Data tidak ditemukan");
            redirect(base_url());
        }        
    }
    function tambah_wishlist()
    {
        $get = $this->input->get();
        
        $id_pelanggan = $this->session->userdata('bumdes_id');

        
        $where_cek = array(
            'id_produk' => $get['id_produk'],
            'id_pelanggan' => $id_pelanggan 
        );
        $cek_wishlist = $this->M_admin->select_where('wishlist', $where_cek)->num_rows();
        
        if($cek_wishlist > 0)
        {
            $redirect_to = $get['from'];
            $this->session->set_flashdata('error', "Produk sudah ada dalam Wishlist");
		    redirect(base_url($redirect_to));
        }
        else {
            $data_insert = array(
                'id_produk' => $get['id_produk'], 
                'id_pelanggan' => $id_pelanggan, 
            );
            $this->M_admin->insert_data('wishlist', $data_insert);
                
            $redirect_to = $get['from'];
            $this->session->set_flashdata('success', "Produk Berhasil masuk dalam Wishlist");
            redirect(base_url($redirect_to));
        }
    }
	public function hapus($id)
	{
		$where_hapus = array('id' => $id, );
		$this->M_admin->delete_data('cart', $where_hapus);

        redirect(base_url('home'));
	}
    public function hapus_wishlist($id)
	{
		$where_hapus = array('id' => $id, );
		$this->M_admin->delete_data('wishlist', $where_hapus);

        redirect(base_url('home'));
	}
}
