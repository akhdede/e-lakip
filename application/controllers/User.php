<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		
	}

	public function index()
	{
		if($this->session->has_userdata('logged_in') == TRUE){
			redirect('dashboard');
		}
		$this->load->view('login');
	}

	public function loginAction()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$tahun = $this->input->post('tahun');

		if(empty($username) || empty($password)){
			$data = array('message' => '<div class="alert alert-danger">Username atau password tidak boleh kosong!</div>');
		}
		else{
			$where = array('username' => $username);

			$cek = $this->m_user->cekLogin('users', $where);

			$row = $cek->num_rows();

			if($row > 0){
				$result = $cek->row_array();

				$hash = $result['password'];

				if(password_verify($password, $hash)){
					$data = array(	'username' 	=>	$result['username'],
									'level' 	=>	$result['level'],
									'tahun'		=>	$tahun,
									'logged_in'	=>	TRUE
								 );
					$this->session->set_userdata($data);
					redirect('dashboard');
				}
				else{
					$data = array('message' => '<div class="alert alert-danger">Username atau password tidak sesuai!</div>');
				}
			}
			else{
				$data = array('message' => '<div class="alert alert-danger">User tidak ditemukan!</div>');
			}

		}

		$this->load->view('login', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		$data = array('message' => '<div class="alert alert-success">Anda telah berhasil logout!</div>' );
		$this->load->view('login', $data);
	}
}
