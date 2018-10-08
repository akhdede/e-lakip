<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_print');

		if($this->session->has_userdata('logged_in') == FALSE){
			redirect('user');
		}
		
	}

	public function index()
	{
		$data = array(	'isi' 					=> 'print',
						'menu'					=> $this->m_print->menu(),
						'submenu'				=> $this->m_print->submenu()
		);
		$this->load->view($data['isi'], $data);
	}

}