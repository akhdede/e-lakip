<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_menu');
		$this->load->model('m_dashboard');

		if($this->session->has_userdata('logged_in') == FALSE){
			redirect('user');
		}
		
	}

	public function index()
	{
		$data = array(	'isi' 					=> 'dashboard',
						'sidebar'				=> 'layouts/sidebar',
						'title'					=> 'E - L A K I P',
						'menu'					=> $this->m_menu->menu(),
						'submenu'				=> $this->m_menu->submenu(),
						'menu_dashboard'		=> $this->m_dashboard->menu(),
						'submenu_dashboard'		=> $this->m_dashboard->submenu(),
						'single_menu'			=> $this->m_dashboard->singleMenu(),
						'persen_selesai'		=> $this->m_dashboard->persenSelesai(),
						'persen_sedang'			=> $this->m_dashboard->persenSedang(),
						'persen_belum'			=> $this->m_dashboard->persenBelum()


		);
		$this->load->view('layouts/wrapper', $data);
	}

}