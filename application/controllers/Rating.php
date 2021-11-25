<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rating extends CI_Controller {

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
	

	public function tambah_rating()
	{
		$post = $this->input->post();

		$id_pelanggan = $this->session->userdata['bumdes_id'];
		$id_produk = $post['id_produk'];

		$data = array(
			'id_produk' => $post['id_produk'],
			'id_pelanggan' => $id_pelanggan,
			'rating' => $post['rating'],
			'comment' => $post['comment'] 
		);

		$this->M_admin->insert_data('rating', $data);

		redirect(base_url('produk/detail/'.$id_produk));
	}
}
