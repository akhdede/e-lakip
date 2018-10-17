<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_menu');
		$this->load->model('m_pk');

		if($this->session->has_userdata('logged_in') == FALSE){
			redirect('user');
		}
		
	}

	public function index()
	{
		$nama = $this->input->post('nama');

		$where = array('nama' => $nama );

		$message = null;

		if(isset($nama)){
			if(empty($nama)){
				$message = '<span class="text-danger">Nama program tidak boleh kosong!</span>';
			}
			else{
				$row = $this->m_pk->cekProgram($where)->num_rows();

				if($row > 0){
					$message = '<span class="text-danger">Nama program sudah ada!</span>';
				}
				else{
					$add = $this->m_pk->addProgram($where);
					if($add){
						$message = '<span class="text-success">Program berhasil ditambahkan!</span>';
						header("Refresh: 1;url=". base_url()."pk");			
					}					
				}
			}			
		}

		$data = array(	'isi' 					=> 'program_kegiatan/program_kegiatan',
						'sidebar'				=> 'layouts/sidebar',
						'title'					=> 'E - L A K I P',
						'menu'					=> $this->m_menu->menu(),
						'submenu'				=> $this->m_menu->submenu(),
						'viewProgram'			=> $this->m_pk->viewProgram(),
						'viewKegiatan'			=> $this->m_pk->viewKegiatan(),
						'message'				=> $message
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function delete_program($id)
	{
		$where = array('id' => $id );

		$cek = $this->m_pk->cekProgram($where)->num_rows();

		$message = null;

		if($cek > 0){
			$delete = $this->m_pk->deleteProgram($where);
			if($delete){
				$message = '<span class="text-success">Program berhasil dihapus!</span>';
				header("Refresh: 1;url=". base_url()."pk");			
			}
		}
		else{
			$message = '<span class="text-danger">Program tidak ditemukan!</span>';
		}

		$data = array(	'isi' 					=> 'program_kegiatan/program_kegiatan',
						'sidebar'				=> 'layouts/sidebar',
						'title'					=> 'E - L A K I P',
						'menu'					=> $this->m_menu->menu(),
						'submenu'				=> $this->m_menu->submenu(),
						'viewProgram'			=> $this->m_pk->viewProgram(),
						'message'				=> $message
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function edit_program($id)
	{
		$where = array('id' => $id );

		$message = null;

		$update = $this->input->post('update');

		if(isset($update)){
			$nama = array('nama' => $this->input->post('nama'));
			if(empty($nama['nama'])){
				$message = '<span class="text-danger">Nama program tidak boleh kosong!</span>';
			}
			else{
				$update = $this->m_pk->updateProgram($nama, $where);
				if($update){
					$message = '<span class="text-success">Program berhasil diubah!</span>';
					header("Refresh: 1;url=". base_url()."pk");			
				}
			}
		}
		$data = array(	'isi' 					=> 'program_kegiatan/program_kegiatan',
						'sidebar'				=> 'layouts/sidebar',
						'title'					=> 'E - L A K I P',
						'menu'					=> $this->m_menu->menu(),
						'submenu'				=> $this->m_menu->submenu(),
						'viewProgram'			=> $this->m_pk->viewProgram(),
						'message'				=> $message
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function add_kegiatan()
	{

		$message = null;

		$simpan = $this->input->post('simpan');

		if(isset($simpan)){
			$insert = array(	'nama'		 => $this->input->post('nama'), 
								'id_program' => $this->input->post('id_program')
			);

			if(empty($insert['nama'])){
				$message = '<span class="text-danger">Nama kegiatan tidak boleh kosong!</span>';
			}
			else{
				$add = $this->m_pk->addKegiatan($insert);
				if($add){
					$message = '<span class="text-success">Kegiatan berhasil tambahkan!</span>';
					header("Refresh: 1;url=". base_url()."pk");			
				}
			}
		}
		$data = array(	'isi' 					=> 'program_kegiatan/program_kegiatan',
						'sidebar'				=> 'layouts/sidebar',
						'title'					=> 'E - L A K I P',
						'menu'					=> $this->m_menu->menu(),
						'submenu'				=> $this->m_menu->submenu(),
						'viewProgram'			=> $this->m_pk->viewProgram(),
						'message'				=> $message
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function delete_kegiatan($id)
	{
		$where = array('id' => $id );

		$cek = $this->m_pk->cekKegiatan($where)->num_rows();

		$message = null;

		if($cek > 0){
			$delete = $this->m_pk->deleteKegiatan($where);
			if($delete){
				$message = '<span class="text-success">Kegiatan berhasil dihapus!</span>';
				header("Refresh: 1;url=". base_url()."pk");			
			}
		}
		else{
			$message = '<span class="text-danger">Kegiatan tidak ditemukan!</span>';
		}

		$data = array(	'isi' 					=> 'program_kegiatan/program_kegiatan',
						'sidebar'				=> 'layouts/sidebar',
						'title'					=> 'E - L A K I P',
						'menu'					=> $this->m_menu->menu(),
						'submenu'				=> $this->m_menu->submenu(),
						'viewProgram'			=> $this->m_pk->viewProgram(),
						'message'				=> $message
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function edit_kegiatan($id)
	{
		$where = array('id' => $id );

		$message = null;

		$update = $this->input->post('update');

		if(isset($update)){
			$nama = array('nama' => $this->input->post('nama'));
			if(empty($nama['nama'])){
				$message = '<span class="text-danger">Nama program tidak boleh kosong!</span>';
			}
			else{
				$update = $this->m_pk->updateKegiatan($nama, $where);
				if($update){
					$message = '<span class="text-success">Program berhasil diubah!</span>';
					header("Refresh: 1;url=". base_url()."pk");			
				}
			}
		}
		$data = array(	'isi' 					=> 'program_kegiatan/program_kegiatan',
						'sidebar'				=> 'layouts/sidebar',
						'title'					=> 'E - L A K I P',
						'menu'					=> $this->m_menu->menu(),
						'submenu'				=> $this->m_menu->submenu(),
						'viewProgram'			=> $this->m_pk->viewProgram(),
						'message'				=> $message
		);
		$this->load->view('layouts/wrapper', $data);
	}
}