<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
            $data_insert = array(
                'id_produk' => $post['id_produk'], 
                'qty' => $post['qty'], 
                'id_pelanggan' => $id_pelanggan, 
            );
        }
        elseif($get != null)
        {
             $data_insert = array(
                'id_produk' => $get['id_produk'], 
                'qty' => 1, 
                'id_pelanggan' => $id_pelanggan, 
            );
        }
        
        $this->M_admin->insert_data('cart', $data_insert);
    }
    function tambah_wishlist()
    {
        $get = $this->input->get();
        
        $id_pelanggan = $this->session->userdata('bumdes_id');

        $data_insert = array(
            'id_produk' => $get['id'], 
            'id_pelanggan' => $id_pelanggan
        );

        $this->M_admin->insert_data('wishlist', $data_insert);

        $redirect_to = $get['from'];
        redirect(base_url($redirect_to));
    }
}
