<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_menu');
		$this->load->model('m_submenu');

		$this->sidebar = 'layouts/sidebar';
		$this->title = 'E - L A K I P';

		if($this->session->has_userdata('logged_in') == FALSE){
			redirect('user');
		}		
	}

	// Start of index

	public function index()
	{
		redirect('submenu/latarbelakang');
	}

	// End of index

	// Start of bab 1

	// Start of latar belakang

	public function latarBelakang()
	{
		$where = array(	'id_submenu'	=> 1,
			'tahun'		=> $_SESSION['tahun']
		);
		$data = array(	'title'		=> $this->title,
			'sidebar'	=> $this->sidebar,
			'menu'		=> $this->m_menu->menu(),
			'submenu'	=> $this->m_menu->submenu(),
			'isi' 		=> 'bab1/latar_belakang/latar_belakang',
			'latarBelakang'	=> $this->m_submenu->latarBelakang($where)						
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function addlatarBelakang()
	{
		$where = array(	'konten'	=> $this->input->post('konten'),
			'id_submenu'	=> 1,
			'tahun'		=> $_SESSION['tahun']
		);

		$message = null;

		if(isset($where['konten'])){
			if(empty($where['konten'])){
				$message = '<span class="text-danger">Latar belakang tidak boleh kosong!</span>';
			}
			else{
				$add = $this->m_submenu->addLatarBelakang($where);
				if($add){
					$message = '<span class="text-success">Latar belakang berhasil ditambahkan!</span>';
					header("Refresh: 1;url=". base_url()."submenu/latarbelakang");

				}
			}
		}

		$row = $this->m_submenu->latarBelakang($where = array('id_submenu' => $where['id_submenu'], 'tahun' => $where['tahun']))->num_rows();

		if ($row > 0) {
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab1/latar_belakang/latar_belakang',
				'latarBelakang'	=> $this->m_submenu->latarBelakang($where),
				'message'	=> $message

			);

		}
		else{
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab1/latar_belakang/add_latar_belakang',
				'message'		=> $message						
			);

		}

		$this->load->view('layouts/wrapper', $data);
	}

	public function editlatarBelakang($id)
	{
		
		$where = array('id' => $id );

		$input = $this->input->post('update');

		$message = null;

		$row = $this->m_submenu->latarBelakang($where)->num_rows();

		if ($row > 0) {
			if (isset($input)) {
				$konten = array('konten' => $this->input->post('konten') );
				if (empty($konten['konten'])) {
					$message = '<span class="text-danger">Latar belakang tidak boleh kosong!</span>';
				}
				else{
					$update = $this->m_submenu->updateLatarBelakang($konten, $where);
					if ($update) {
						$message = '<span class="text-success">Latar belakang berhasil diubah!</span>';
						header("Refresh: 1;url=". base_url()."submenu/latarbelakang");					
					}				
				}
			}

			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab1/latar_belakang/edit_latar_belakang',
				'edit'		=> $this->m_submenu->latarBelakang($where),
				'message'	=> $message
			);		

			$this->load->view('layouts/wrapper', $data);
		}
		else{
			redirect('submenu/latarbelakang');
		}
	}

	public function deleteLatarBelakang($id)
	{
		$where = array('id' => $id );

		$row = $this->m_submenu->latarBelakang($where)->num_rows();

		if ($row > 0) {
			$delete = $this->m_submenu->deleteLatarBelakang($where);
			if ($delete) {
				$message = '<span class="text-success">Latar belakang berhasil dihapus!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab1/latar_belakang/latar_belakang',
					'latarBelakang'	=> $this->m_submenu->latarBelakang($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/latarbelakang");
			}
		}
		else{
			redirect('submenu/latarbelakang');
		}
	}

	public function endlatarBelakang($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->latarBelakang($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'y' );

			$update = $this->m_submenu->endLatarBelakang($where, $selesai);

			if ($update) {

				$message = '<span class="text-success">Latar belakang telah ditandai selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab1/latar_belakang/latar_belakang',
					'latarBelakang'	=> $this->m_submenu->latarBelakang($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/latarbelakang");
			}
		}
		else{
			redirect('submenu/latarbelakang');
		}

		$this->load->view('layouts/wrapper', $data);
	}

	public function unlockLatarBelakang($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->latarBelakang($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'n' );

			$update = $this->m_submenu->endLatarBelakang($where, $selesai);

			if ($update) {
				
				$message = '<span class="text-success">Latar belakang telah dikembalikan ke status belum selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab1/latar_belakang/latar_belakang',
					'latarBelakang'	=> $this->m_submenu->latarBelakang($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/latarbelakang");
			}
		}
		else{
			redirect('submenu/latarbelakang');
		}

		$this->load->view('layouts/wrapper', $data);
	}

	// End of latar belakang

	// Start of dasar hukum

	public function dasarHukum()
	{
		$where = array(	'id_submenu'	=> 2,
			'tahun'		=> $_SESSION['tahun']
		);
		$data = array(	'title'		=> $this->title,
			'sidebar'	=> $this->sidebar,
			'menu'		=> $this->m_menu->menu(),
			'submenu'	=> $this->m_menu->submenu(),
			'isi' 		=> 'bab1/dasar_hukum/dasar_hukum',
			'dasarHukum'	=> $this->m_submenu->dasarHukum($where)						
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function addDasarHukum()
	{
		$where = array(	'konten'	=> $this->input->post('konten'),
			'id_submenu'	=> 2,
			'tahun'		=> $_SESSION['tahun']
		);

		$message = null;

		if(isset($where['konten'])){
			if(empty($where['konten'])){
				$message = '<span class="text-danger">Dasar hukum tidak boleh kosong!</span>';
			}
			else{
				$add = $this->m_submenu->addDasarHukum($where);
				if($add){
					$message = '<span class="text-success">Dasar hukum berhasil ditambahkan!</span>';
					header("Refresh: 1;url=". base_url()."submenu/dasarHukum");

				}
			}
		}

		$row = $this->m_submenu->dasarHukum($where = array('id_submenu' => $where['id_submenu'], 'tahun' => $where['tahun']))->num_rows();

		if ($row > 0) {
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab1/dasar_hukum/dasar_hukum',
				'dasarHukum'	=> $this->m_submenu->dasarHukum($where),
				'message'	=> $message

			);

		}
		else{
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab1/dasar_hukum/add_dasar_hukum',
				'message'		=> $message						
			);

		}

		$this->load->view('layouts/wrapper', $data);
	}

	public function editDasarHukum($id)
	{
		
		$where = array('id' => $id );

		$input = $this->input->post('update');

		$message = null;

		$row = $this->m_submenu->dasarHukum($where)->num_rows();

		if ($row > 0) {
			if (isset($input)) {
				$konten = array('konten' => $this->input->post('konten') );
				if (empty($konten['konten'])) {
					$message = '<span class="text-danger">Dasar hukum tidak boleh kosong!</span>';
				}
				else{
					$update = $this->m_submenu->updateDasarHukum($konten, $where);
					if ($update) {
						$message = '<span class="text-success">Dasar hukum berhasil diubah!</span>';
						header("Refresh: 1;url=". base_url()."submenu/DasarHukum");					
					}				
				}
			}

			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab1/dasar_hukum/edit_dasar_hukum',
				'edit'		=> $this->m_submenu->DasarHukum($where),
				'message'	=> $message
			);		

			$this->load->view('layouts/wrapper', $data);
		}
		else{
			redirect('submenu/DasarHukum');
		}
	}

	public function deleteDasarHukum($id)
	{
		$where = array('id' => $id );

		$row = $this->m_submenu->dasarHukum($where)->num_rows();

		if ($row > 0) {
			$delete = $this->m_submenu->deleteDasarHukum($where);
			if ($delete) {
				$message = '<span class="text-success">Dasar hukum berhasil dihapus!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab1/dasar_hukum/dasar_hukum',
					'dasarHukum'	=> $this->m_submenu->dasarHukum($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/dasarHukum");
			}
		}
		else{
			redirect('submenu/dasarHukum');
		}
	}

	public function endDasarHukum($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->dasarHukum($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'y' );

			$update = $this->m_submenu->endDasarHukum($where, $selesai);

			if ($update) {

				$message = '<span class="text-success">Dasar hukum telah ditandai selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab1/dasar_hukum/dasar_hukum',
					'dasarHukum'	=> $this->m_submenu->dasarHukum($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/dasarHukum");
			}
		}
		else{
			redirect('submenu/dasarHukum');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	public function unlockDasarHukum($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->DasarHukum($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'n' );

			$update = $this->m_submenu->endDasarHukum($where, $selesai);

			if ($update) {
				
				$message = '<span class="text-success">Dasar hukum telah dikembalikan ke status belum selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab1/dasar_hukum/dasar_hukum',
					'dasarHukum'	=> $this->m_submenu->DasarHukum($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/DasarHukum");
			}
		}
		else{
			redirect('submenu/DasarHukum');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	// End of dasar hukum

	// Start of tupoksi

	public function tupoksi()
	{
		$where = array(	'id_submenu'	=> 3,
			'tahun'		=> $_SESSION['tahun']
		);
		$data = array(	'title'		=> $this->title,
			'sidebar'	=> $this->sidebar,
			'menu'		=> $this->m_menu->menu(),
			'submenu'	=> $this->m_menu->submenu(),
			'isi' 		=> 'bab1/tupoksi/tupoksi',
			'tupoksi'	=> $this->m_submenu->tupoksi($where)						
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function addTupoksi()
	{
		$where = array(	'konten'	=> $this->input->post('konten'),
			'id_submenu'	=> 3,
			'tahun'		=> $_SESSION['tahun']
		);

		$message = null;

		if(isset($where['konten'])){
			if(empty($where['konten'])){
				$message = '<span class="text-danger">Tupoksi tidak boleh kosong!</span>';
			}
			else{
				$add = $this->m_submenu->addTupoksi($where);
				if($add){
					$message = '<span class="text-success">Tupoksi berhasil ditambahkan!</span>';
					header("Refresh: 1;url=". base_url()."submenu/tupoksi");

				}
			}
		}

		$row = $this->m_submenu->tupoksi($where = array('id_submenu' => $where['id_submenu'], 'tahun' => $where['tahun']))->num_rows();

		if ($row > 0) {
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab1/tupoksi/tupoksi',
				'tupoksi'	=> $this->m_submenu->tupoksi($where),
				'message'	=> $message

			);

		}
		else{
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab1/tupoksi/add_tupoksi',
				'message'		=> $message						
			);

		}

		$this->load->view('layouts/wrapper', $data);
	}

	public function editTupoksi($id)
	{
		
		$where = array('id' => $id );

		$input = $this->input->post('update');

		$message = null;

		$row = $this->m_submenu->tupoksi($where)->num_rows();

		if ($row > 0) {
			if (isset($input)) {
				$konten = array('konten' => $this->input->post('konten') );
				if (empty($konten['konten'])) {
					$message = '<span class="text-danger">Tupoksi tidak boleh kosong!</span>';
				}
				else{
					$update = $this->m_submenu->updateTupoksi($konten, $where);
					if ($update) {
						$message = '<span class="text-success">Tupoksi berhasil diubah!</span>';
						header("Refresh: 1;url=". base_url()."submenu/Tupoksi");					
					}				
				}
			}

			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab1/tupoksi/edit_tupoksi',
				'edit'		=> $this->m_submenu->tupoksi($where),
				'message'	=> $message
			);		

			$this->load->view('layouts/wrapper', $data);
		}
		else{
			redirect('submenu/tupoksi');
		}
	}

	public function deleteTupoksi($id)
	{
		$where = array('id' => $id );

		$row = $this->m_submenu->tupoksi($where)->num_rows();

		if ($row > 0) {
			$delete = $this->m_submenu->deleteTupoksi($where);
			if ($delete) {
				$message = '<span class="text-success">Tupoksi berhasil dihapus!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab1/tupoksi/tupoksi',
					'tupoksi'	=> $this->m_submenu->tupoksi($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/tupoksi");
			}
		}
		else{
			redirect('submenu/tupoksi');
		}
	}

	public function endTupoksi($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->tupoksi($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'y' );

			$update = $this->m_submenu->endTupoksi($where, $selesai);

			if ($update) {

				$message = '<span class="text-success">Tupoksi telah ditandai selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab1/tupoksi/tupoksi',
					'tupoksi'	=> $this->m_submenu->tupoksi($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/tupoksi");
			}
		}
		else{
			redirect('submenu/tupoksi');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	public function unlockTupoksi($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->Tupoksi($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'n' );

			$update = $this->m_submenu->endTupoksi($where, $selesai);

			if ($update) {
				
				$message = '<span class="text-success">Tupoksi telah dikembalikan ke status belum selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab1/tupoksi/tupoksi',
					'tupoksi'	=> $this->m_submenu->tupoksi($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/tupoksi");
			}
		}
		else{
			redirect('submenu/tupoksi');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	// End of tupoksi

	// Start of struktur organisasi

	public function strukturOrganisasi()
	{
		$where = array(	'id_submenu'	=> 4,
			'tahun'		=> $_SESSION['tahun']
		);
		$data = array(	'title'		=> $this->title,
			'sidebar'	=> $this->sidebar,
			'menu'		=> $this->m_menu->menu(),
			'submenu'	=> $this->m_menu->submenu(),
			'isi' 		=> 'bab1/struktur_organisasi/struktur_organisasi',
			'strukturOrganisasi'	=> $this->m_submenu->strukturOrganisasi($where)						
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function addStrukturOrganisasi()
	{
		$where = array(	'konten'	=> $this->input->post('konten'),
			'id_submenu'	=> 4,
			'tahun'		=> $_SESSION['tahun']
		);

		$message = null;

		if(isset($where['konten'])){
			if(empty($where['konten'])){
				$message = '<span class="text-danger">Struktur organisasi tidak boleh kosong!</span>';
			}
			else{
				$add = $this->m_submenu->addStrukturOrganisasi($where);
				if($add){
					$message = '<span class="text-success">Struktur organisasi berhasil ditambahkan!</span>';
					header("Refresh: 1;url=". base_url()."submenu/strukturorganisasi");

				}
			}
		}

		$row = $this->m_submenu->strukturOrganisasi($where = array('id_submenu' => $where['id_submenu'], 'tahun' => $where['tahun']))->num_rows();

		if ($row > 0) {
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab1/struktur_organisasi/struktur_organisasi',
				'strukturOrganisasi'	=> $this->m_submenu->strukturOrganisasi($where),
				'message'	=> $message

			);

		}
		else{
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab1/struktur_organisasi/add_struktur_organisasi',
				'message'		=> $message						
			);

		}

		$this->load->view('layouts/wrapper', $data);
	}

	public function editStrukturOrganisasi($id)
	{
		
		$where = array('id' => $id );

		$input = $this->input->post('update');

		$message = null;

		$row = $this->m_submenu->strukturOrganisasi($where)->num_rows();

		if ($row > 0) {
			if (isset($input)) {
				$konten = array('konten' => $this->input->post('konten') );
				if (empty($konten['konten'])) {
					$message = '<span class="text-danger">Struktur organisasi tidak boleh kosong!</span>';
				}
				else{
					$update = $this->m_submenu->updateStrukturOrganisasi($konten, $where);
					if ($update) {
						$message = '<span class="text-success">Struktur organisasi berhasil diubah!</span>';
						header("Refresh: 1;url=". base_url()."submenu/strukturorganisasi");					
					}				
				}
			}

			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab1/struktur_organisasi/edit_struktur_organisasi',
				'edit'		=> $this->m_submenu->strukturOrganisasi($where),
				'message'	=> $message
			);		

			$this->load->view('layouts/wrapper', $data);
		}
		else{
			redirect('submenu/strukturorganisasi');
		}
	}

	public function deleteStrukturOrganisasi($id)
	{
		$where = array('id' => $id );

		$row = $this->m_submenu->strukturOrganisasi($where)->num_rows();

		if ($row > 0) {
			$delete = $this->m_submenu->deleteStrukturOrganisasi($where);
			if ($delete) {
				$message = '<span class="text-success">Struktur organisasi berhasil dihapus!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab1/struktur_organisasi/struktur_organisasi',
					'strukturOrganisasi'	=> $this->m_submenu->strukturOrganisasi($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/strukturorganisasi");
			}
		}
		else{
			redirect('submenu/strukturorganisasi');
		}
	}

	public function endStrukturOrganisasi($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->strukturOrganisasi($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'y' );

			$update = $this->m_submenu->endStrukturOrganisasi($where, $selesai);

			if ($update) {

				$message = '<span class="text-success">Struktur organisasi telah ditandai selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab1/struktur_organisasi/struktur_organisasi',
					'strukturOrganisasi'	=> $this->m_submenu->strukturOrganisasi($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/strukturorganisasi");
			}
		}
		else{
			redirect('submenu/strukturorganisasi');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	public function unlockStrukturOrganisasi($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->strukturOrganisasi($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'n' );

			$update = $this->m_submenu->endStrukturOrganisasi($where, $selesai);

			if ($update) {
				
				$message = '<span class="text-success">Struktur organisasi telah dikembalikan ke status belum selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab1/struktur_organisasi/struktur_organisasi',
					'strukturOrganisasi'	=> $this->m_submenu->strukturOrganisasi($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/strukturorganisasi");
			}
		}
		else{
			redirect('submenu/strukturorganisasi');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	// End of struktur organisasi

	// End of bab 1

	// Start of bab 2

	// Start of visi misi

	public function visiMisi()
	{
		$where = array(	'id_submenu'	=> 5,
			'tahun'		=> $_SESSION['tahun']
		);
		$data = array(	'title'		=> $this->title,
			'sidebar'	=> $this->sidebar,
			'menu'		=> $this->m_menu->menu(),
			'submenu'	=> $this->m_menu->submenu(),
			'isi' 		=> 'bab2/visi_misi/visi_misi',
			'visiMisi'	=> $this->m_submenu->visiMisi($where)						
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function addVisiMisi()
	{
		$where = array(	'konten'	=> $this->input->post('konten'),
			'id_submenu'	=> 5,
			'tahun'		=> $_SESSION['tahun']
		);

		$message = null;

		if(isset($where['konten'])){
			if(empty($where['konten'])){
				$message = '<span class="text-danger">Visi misi tidak boleh kosong!</span>';
			}
			else{
				$add = $this->m_submenu->addVisiMisi($where);
				if($add){
					$message = '<span class="text-success">Visi misi berhasil ditambahkan!</span>';
					header("Refresh: 1;url=". base_url()."submenu/visimisi");

				}
			}
		}

		$row = $this->m_submenu->visiMisi($where = array('id_submenu' => $where['id_submenu'], 'tahun' => $where['tahun']))->num_rows();

		if ($row > 0) {
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab2/visi_misi/visi_misi',
				'visiMisi'	=> $this->m_submenu->visiMisi($where),
				'message'	=> $message

			);

		}
		else{
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab2/visi_misi/add_visi_misi',
				'message'		=> $message						
			);

		}

		$this->load->view('layouts/wrapper', $data);
	}

	public function editVisiMisi($id)
	{
		
		$where = array('id' => $id );

		$input = $this->input->post('update');

		$message = null;

		$row = $this->m_submenu->visiMisi($where)->num_rows();

		if ($row > 0) {
			if (isset($input)) {
				$konten = array('konten' => $this->input->post('konten') );
				if (empty($konten['konten'])) {
					$message = '<span class="text-danger">Visi misi tidak boleh kosong!</span>';
				}
				else{
					$update = $this->m_submenu->updateVisiMisi($konten, $where);
					if ($update) {
						$message = '<span class="text-success">Visi misi berhasil diubah!</span>';
						header("Refresh: 1;url=". base_url()."submenu/visimisi");					
					}				
				}
			}

			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab2/visi_misi/edit_visi_misi',
				'edit'		=> $this->m_submenu->visiMisi($where),
				'message'	=> $message
			);		

			$this->load->view('layouts/wrapper', $data);
		}
		else{
			redirect('submenu/visimisi');
		}
	}

	public function deleteVisiMisi($id)
	{
		$where = array('id' => $id );

		$row = $this->m_submenu->visiMisi($where)->num_rows();

		if ($row > 0) {
			$delete = $this->m_submenu->deleteVisiMisi($where);
			if ($delete) {
				$message = '<span class="text-success">Visi misi berhasil dihapus!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab2/visi_misi/visi_misi',
					'visiMisi'	=> $this->m_submenu->visiMisi($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/visimisi");
			}
		}
		else{
			redirect('submenu/visimisi');
		}
	}

	public function endVisiMisi($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->visiMisi($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'y' );

			$update = $this->m_submenu->endVisiMisi($where, $selesai);

			if ($update) {

				$message = '<span class="text-success">Visi misi telah ditandai selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab2/visi_misi/visi_misi',
					'visiMisi'	=> $this->m_submenu->visiMisi($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/visimisi");
			}
		}
		else{
			redirect('submenu/visimisi');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	public function unlockVisiMisi($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->visiMisi($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'n' );

			$update = $this->m_submenu->endVisiMisi($where, $selesai);

			if ($update) {
				
				$message = '<span class="text-success">Visi misi telah dikembalikan ke status belum selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab2/visi_misi/visi_misi',
					'visiMisi'	=> $this->m_submenu->visiMisi($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/visimisi");
			}
		}
		else{
			redirect('submenu/visimisi');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	// End of visi misi

	// Start of tujuan sasaran

	public function tujuanSasaran()
	{
		$where = array(	'id_submenu'	=> 6,
			'tahun'		=> $_SESSION['tahun']
		);
		$data = array(	'title'		=> $this->title,
			'sidebar'	=> $this->sidebar,
			'menu'		=> $this->m_menu->menu(),
			'submenu'	=> $this->m_menu->submenu(),
			'isi' 		=> 'bab2/tujuan_sasaran/tujuan_sasaran',
			'tujuanSasaran'	=> $this->m_submenu->tujuanSasaran($where)						
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function addTujuanSasaran()
	{
		$where = array(	'konten'	=> $this->input->post('konten'),
			'id_submenu'	=> 6,
			'tahun'		=> $_SESSION['tahun']
		);

		$message = null;

		if(isset($where['konten'])){
			if(empty($where['konten'])){
				$message = '<span class="text-danger">Tujuan sasaran tidak boleh kosong!</span>';
			}
			else{
				$add = $this->m_submenu->addTujuanSasaran($where);
				if($add){
					$message = '<span class="text-success">Tujuan sasaran berhasil ditambahkan!</span>';
					header("Refresh: 1;url=". base_url()."submenu/tujuansasaran");

				}
			}
		}

		$row = $this->m_submenu->tujuanSasaran($where = array('id_submenu' => $where['id_submenu'], 'tahun' => $where['tahun']))->num_rows();

		if ($row > 0) {
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab2/tujuan_sasaran/tujuan_sasaran',
				'tujuanSasaran'	=> $this->m_submenu->tujuanSasaran($where),
				'message'	=> $message

			);

		}
		else{
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab2/tujuan_sasaran/add_tujuan_sasaran',
				'message'		=> $message						
			);

		}

		$this->load->view('layouts/wrapper', $data);
	}

	public function editTujuanSasaran($id)
	{
		
		$where = array('id' => $id );

		$input = $this->input->post('update');

		$message = null;

		$row = $this->m_submenu->tujuanSasaran($where)->num_rows();

		if ($row > 0) {
			if (isset($input)) {
				$konten = array('konten' => $this->input->post('konten') );
				if (empty($konten['konten'])) {
					$message = '<span class="text-danger">Tujuan sasaran tidak boleh kosong!</span>';
				}
				else{
					$update = $this->m_submenu->updateTujuanSasaran($konten, $where);
					if ($update) {
						$message = '<span class="text-success">Tujuan sasaran berhasil diubah!</span>';
						header("Refresh: 1;url=". base_url()."submenu/tujuansasaran");					
					}				
				}
			}

			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab2/tujuan_sasaran/edit_tujuan_sasaran',
				'edit'		=> $this->m_submenu->tujuanSasaran($where),
				'message'	=> $message
			);		

			$this->load->view('layouts/wrapper', $data);
		}
		else{
			redirect('submenu/tujuansasaran');
		}
	}

	public function deleteTujuanSasaran($id)
	{
		$where = array('id' => $id );

		$row = $this->m_submenu->tujuanSasaran($where)->num_rows();

		if ($row > 0) {
			$delete = $this->m_submenu->deleteTujuanSasaran($where);
			if ($delete) {
				$message = '<span class="text-success">Tujuan sasaran berhasil dihapus!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab2/tujuan_sasaran/tujuan_sasaran',
					'tujuanSasaran'	=> $this->m_submenu->tujuanSasaran($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/tujuansasaran");
			}
		}
		else{
			redirect('submenu/tujuansasaran');
		}
	}

	public function endTujuanSasaran($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->tujuanSasaran($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'y' );

			$update = $this->m_submenu->endTujuanSasaran($where, $selesai);

			if ($update) {

				$message = '<span class="text-success">Tujuan sasaran telah ditandai selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab2/tujuan_sasaran/tujuan_sasaran',
					'tujuanSasaran'	=> $this->m_submenu->tujuanSasaran($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/tujuansasaran");
			}
		}
		else{
			redirect('submenu/tujuansasaran');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	public function unlockTujuanSasaran($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->tujuanSasaran($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'n' );

			$update = $this->m_submenu->endTujuanSasaran($where, $selesai);

			if ($update) {
				
				$message = '<span class="text-success">Tujuan sasaran telah dikembalikan ke status belum selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab2/tujuan_sasaran/tujuan_sasaran',
					'tujuanSasaran'	=> $this->m_submenu->tujuanSasaran($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/tujuansasaran");
			}
		}
		else{
			redirect('submenu/tujuansasaran');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	// End of tujuan sasaran

	// Start of arah kebijakan umum

	public function arahKebijakanUmum()
	{
		$where = array(	'id_submenu'	=> 7,
			'tahun'		=> $_SESSION['tahun']
		);
		$data = array(	'title'		=> $this->title,
			'sidebar'	=> $this->sidebar,
			'menu'		=> $this->m_menu->menu(),
			'submenu'	=> $this->m_menu->submenu(),
			'isi' 		=> 'bab2/arah_kebijakan_umum/arah_kebijakan_umum',
			'arahKebijakanUmum'	=> $this->m_submenu->arahKebijakanUmum($where)						
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function addArahKebijakanUmum()
	{
		$where = array(	'konten'	=> $this->input->post('konten'),
			'id_submenu'	=> 7,
			'tahun'		=> $_SESSION['tahun']
		);

		$message = null;

		if(isset($where['konten'])){
			if(empty($where['konten'])){
				$message = '<span class="text-danger">Arah kebijakan umum tidak boleh kosong!</span>';
			}
			else{
				$add = $this->m_submenu->addArahKebijakanUmum($where);
				if($add){
					$message = '<span class="text-success">Arah kebijakan umum berhasil ditambahkan!</span>';
					header("Refresh: 1;url=". base_url()."submenu/arahkebijakanumum");

				}
			}
		}

		$row = $this->m_submenu->arahKebijakanUmum($where = array('id_submenu' => $where['id_submenu'], 'tahun' => $where['tahun']))->num_rows();

		if ($row > 0) {
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab2/arah_kebijakan_umum/arah_kebijakan_umum',
				'arahKebijakanUmum'	=> $this->m_submenu->arahKebijakanUmum($where),
				'message'	=> $message

			);

		}
		else{
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab2/arah_kebijakan_umum/add_arah_kebijakan_umum',
				'message'		=> $message						
			);

		}

		$this->load->view('layouts/wrapper', $data);
	}

	public function editArahKebijakanUmum($id)
	{
		
		$where = array('id' => $id );

		$input = $this->input->post('update');

		$message = null;

		$row = $this->m_submenu->arahKebijakanUmum($where)->num_rows();

		if ($row > 0) {
			if (isset($input)) {
				$konten = array('konten' => $this->input->post('konten') );
				if (empty($konten['konten'])) {
					$message = '<span class="text-danger">Arah kebijakan umum tidak boleh kosong!</span>';
				}
				else{
					$update = $this->m_submenu->updateArahKebijakanUmum($konten, $where);
					if ($update) {
						$message = '<span class="text-success">Arah kebijakan umum berhasil diubah!</span>';
						header("Refresh: 1;url=". base_url()."submenu/arahkebijakanumum");					
					}				
				}
			}

			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab2/arah_kebijakan_umum/edit_arah_kebijakan_umum',
				'edit'		=> $this->m_submenu->arahKebijakanUmum($where),
				'message'	=> $message
			);		

			$this->load->view('layouts/wrapper', $data);
		}
		else{
			redirect('submenu/arahkebijakanumum');
		}
	}

	public function deleteArahKebijakanUmum($id)
	{
		$where = array('id' => $id );

		$row = $this->m_submenu->arahKebijakanUmum($where)->num_rows();

		if ($row > 0) {
			$delete = $this->m_submenu->deleteArahKebijakanUmum($where);
			if ($delete) {
				$message = '<span class="text-success">Arah kebijakan umum berhasil dihapus!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab2/arah_kebijakan_umum/arah_kebijakan_umum',
					'arahKebijakanUmum'	=> $this->m_submenu->arahKebijakanUmum($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/arahkebijakanumum");
			}
		}
		else{
			redirect('submenu/arahkebijakanumum');
		}
	}

	public function endArahKebijakanUmum($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->arahKebijakanUmum($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'y' );

			$update = $this->m_submenu->endArahKebijakanUmum($where, $selesai);

			if ($update) {

				$message = '<span class="text-success">Arah kebijakan umum telah ditandai selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab2/arah_kebijakan_umum/arah_kebijakan_umum',
					'arahKebijakanUmum'	=> $this->m_submenu->arahKebijakanUmum($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/arahkebijakanumum");
			}
		}
		else{
			redirect('submenu/arahkebijakanumum');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	public function unlockArahKebijakanUmum($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->arahKebijakanUmum($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'n' );

			$update = $this->m_submenu->endArahKebijakanUmum($where, $selesai);

			if ($update) {
				
				$message = '<span class="text-success">Arah kebijakan umum telah dikembalikan ke status belum selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab2/arah_kebijakan_umum/arah_kebijakan_umum',
					'arahKebijakanUmum'	=> $this->m_submenu->arahKebijakanUmum($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/arahkebijakanumum");
			}
		}
		else{
			redirect('submenu/arahkebijakanumum');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	// End of arah kebijakan umum

	// Start of rencana kinerja

	public function rencanaKinerja()
	{
		$where = array(	'id_submenu'	=> 8,
			'tahun'		=> $_SESSION['tahun']
		);
		$data = array(	'title'		=> $this->title,
			'sidebar'	=> $this->sidebar,
			'menu'		=> $this->m_menu->menu(),
			'submenu'	=> $this->m_menu->submenu(),
			'isi' 		=> 'bab2/rencana_kinerja/rencana_kinerja',
			'rencanaKinerja'	=> $this->m_submenu->rencanaKinerja($where)						
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function addRencanaKinerja()
	{
		$where = array(	'konten'	=> $this->input->post('konten'),
			'id_submenu'	=> 8,
			'tahun'		=> $_SESSION['tahun']
		);

		$message = null;

		if(isset($where['konten'])){
			if(empty($where['konten'])){
				$message = '<span class="text-danger">Rencana kinerja tidak boleh kosong!</span>';
			}
			else{
				$add = $this->m_submenu->addRencanaKinerja($where);
				if($add){
					$message = '<span class="text-success">Rencana kinerja berhasil ditambahkan!</span>';
					header("Refresh: 1;url=". base_url()."submenu/rencanakinerja");

				}
			}
		}

		$row = $this->m_submenu->rencanaKinerja($where = array('id_submenu' => $where['id_submenu'], 'tahun' => $where['tahun']))->num_rows();

		if ($row > 0) {
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab2/rencana_kinerja/rencana_kinerja',
				'rencanaKinerja'	=> $this->m_submenu->rencanaKinerja($where),
				'message'	=> $message

			);

		}
		else{
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab2/rencana_kinerja/add_rencana_kinerja',
				'message'		=> $message						
			);

		}

		$this->load->view('layouts/wrapper', $data);
	}

	public function editRencanaKinerja($id)
	{
		
		$where = array('id' => $id );

		$input = $this->input->post('update');

		$message = null;

		$row = $this->m_submenu->rencanaKinerja($where)->num_rows();

		if ($row > 0) {
			if (isset($input)) {
				$konten = array('konten' => $this->input->post('konten') );
				if (empty($konten['konten'])) {
					$message = '<span class="text-danger">Rencana kinerja tidak boleh kosong!</span>';
				}
				else{
					$update = $this->m_submenu->updateRencanaKinerja($konten, $where);
					if ($update) {
						$message = '<span class="text-success">Rencana kinerja berhasil diubah!</span>';
						header("Refresh: 1;url=". base_url()."submenu/rencanakinerja");					
					}				
				}
			}

			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab2/rencana_kinerja/edit_rencana_kinerja',
				'edit'		=> $this->m_submenu->rencanaKinerja($where),
				'message'	=> $message
			);		

			$this->load->view('layouts/wrapper', $data);
		}
		else{
			redirect('submenu/rencanakinerja');
		}
	}

	public function deleteRencanaKinerja($id)
	{
		$where = array('id' => $id );

		$row = $this->m_submenu->rencanaKinerja($where)->num_rows();

		if ($row > 0) {
			$delete = $this->m_submenu->deleteRencanaKinerja($where);
			if ($delete) {
				$message = '<span class="text-success">Rencana kinerja berhasil dihapus!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab2/rencana_kinerja/rencana_kinerja',
					'rencanaKinerja'	=> $this->m_submenu->rencanaKinerja($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/rencanakinerja");
			}
		}
		else{
			redirect('submenu/rencanakinerja');
		}
	}

	public function endRencanaKinerja($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->rencanaKinerja($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'y' );

			$update = $this->m_submenu->endRencanaKinerja($where, $selesai);

			if ($update) {

				$message = '<span class="text-success">Rencana kinerja telah ditandai selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab2/rencana_kinerja/rencana_kinerja',
					'rencanaKinerja'	=> $this->m_submenu->rencanaKinerja($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/rencanakinerja");
			}
		}
		else{
			redirect('submenu/rencanakinerja');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	public function unlockRencanaKinerja($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->rencanaKinerja($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'n' );

			$update = $this->m_submenu->endRencanaKinerja($where, $selesai);

			if ($update) {
				
				$message = '<span class="text-success">Rencana kinerja telah dikembalikan ke status belum selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab2/rencana_kinerja/rencana_kinerja',
					'rencanaKinerja'	=> $this->m_submenu->rencanaKinerja($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/rencanakinerja");
			}
		}
		else{
			redirect('submenu/rencanakinerja');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	// End of rencana kinerja

	// Start of cara capai tujuan sasaran

	public function caraCapaiTujuanSasaran()
	{
		$where = array(	'id_submenu'	=> 9,
			'tahun'		=> $_SESSION['tahun']
		);
		$data = array(	'title'		=> $this->title,
			'sidebar'	=> $this->sidebar,
			'menu'		=> $this->m_menu->menu(),
			'submenu'	=> $this->m_menu->submenu(),
			'isi' 		=> 'bab2/cara_capai_tujuan_sasaran/cara_capai_tujuan_sasaran',
			'caraCapaiTujuanSasaran'	=> $this->m_submenu->caraCapaiTujuanSasaran($where)						
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function addCaraCapaiTujuanSasaran()
	{
		$where = array(	'konten'	=> $this->input->post('konten'),
			'id_submenu'	=> 9,
			'tahun'		=> $_SESSION['tahun']
		);

		$message = null;

		if(isset($where['konten'])){
			if(empty($where['konten'])){
				$message = '<span class="text-danger">Cara capai tujuan sasaran tidak boleh kosong!</span>';
			}
			else{
				$add = $this->m_submenu->addCaraCapaiTujuanSasaran($where);
				if($add){
					$message = '<span class="text-success">Cara capai tujuan sasaran berhasil ditambahkan!</span>';
					header("Refresh: 1;url=". base_url()."submenu/caracapaitujuansasaran");

				}
			}
		}

		$row = $this->m_submenu->caraCapaiTujuanSasaran($where = array('id_submenu' => $where['id_submenu'], 'tahun' => $where['tahun']))->num_rows();

		if ($row > 0) {
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab2/cara_capai_tujuan_sasaran/cara_capai_tujuan_sasaran',
				'caraCapaiTujuanSasaran'	=> $this->m_submenu->caraCapaiTujuanSasaran($where),
				'message'	=> $message

			);

		}
		else{
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab2/cara_capai_tujuan_sasaran/add_cara_capai_tujuan_sasaran',
				'message'		=> $message						
			);

		}

		$this->load->view('layouts/wrapper', $data);
	}

	public function editCaraCapaiTujuanSasaran($id)
	{
		
		$where = array('id' => $id );

		$input = $this->input->post('update');

		$message = null;

		$row = $this->m_submenu->caraCapaiTujuanSasaran($where)->num_rows();

		if ($row > 0) {
			if (isset($input)) {
				$konten = array('konten' => $this->input->post('konten') );
				if (empty($konten['konten'])) {
					$message = '<span class="text-danger">Cara capai tujuan sasaran tidak boleh kosong!</span>';
				}
				else{
					$update = $this->m_submenu->updateCaraCapaiTujuanSasaran($konten, $where);
					if ($update) {
						$message = '<span class="text-success">Cara capai tujuan sasaran berhasil diubah!</span>';
						header("Refresh: 1;url=". base_url()."submenu/caracapaitujuansasaran");					
					}				
				}
			}

			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab2/cara_capai_tujuan_sasaran/edit_cara_capai_tujuan_sasaran',
				'edit'		=> $this->m_submenu->caraCapaiTujuanSasaran($where),
				'message'	=> $message
			);		

			$this->load->view('layouts/wrapper', $data);
		}
		else{
			redirect('submenu/caracapaitujuansasaran');
		}
	}

	public function deleteCaraCapaiTujuanSasaran($id)
	{
		$where = array('id' => $id );

		$row = $this->m_submenu->caraCapaiTujuanSasaran($where)->num_rows();

		if ($row > 0) {
			$delete = $this->m_submenu->deleteCaraCapaiTujuanSasaran($where);
			if ($delete) {
				$message = '<span class="text-success">Cara capai tujuan sasaran berhasil dihapus!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab2/cara_capai_tujuan_sasaran/cara_capai_tujuan_sasaran',
					'caraCapaiTujuanSasaran'	=> $this->m_submenu->caraCapaiTujuanSasaran($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/caracapaitujuansasaran");
			}
		}
		else{
			redirect('submenu/caracapaitujuansasaran');
		}
	}

	public function endCaraCapaiTujuanSasaran($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->caraCapaiTujuanSasaran($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'y' );

			$update = $this->m_submenu->endCaraCapaiTujuanSasaran($where, $selesai);

			if ($update) {

				$message = '<span class="text-success">Cara capai tujuan sasaran telah ditandai selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab2/cara_capai_tujuan_sasaran/cara_capai_tujuan_sasaran',
					'caraCapaiTujuanSasaran'	=> $this->m_submenu->caraCapaiTujuanSasaran($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/caracapaitujuansasaran");
			}
		}
		else{
			redirect('submenu/caracapaitujuansasaran');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	public function unlockCaraCapaiTujuanSasaran($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->caraCapaiTujuanSasaran($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'n' );

			$update = $this->m_submenu->endCaraCapaiTujuanSasaran($where, $selesai);

			if ($update) {
				
				$message = '<span class="text-success">Cara capai tujuan sasaran telah dikembalikan ke status belum selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab2/cara_capai_tujuan_sasaran/cara_capai_tujuan_sasaran',
					'caraCapaiTujuanSasaran'	=> $this->m_submenu->caraCapaiTujuanSasaran($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/caracapaitujuansasaran");
			}
		}
		else{
			redirect('submenu/caracapaitujuansasaran');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	// End of cara capai tujuan sasaran

	// End of bab 2

	// Start of bab 3

	// Start of capaian kinerja

	public function capaianKinerja()
	{
		$where = array(	'id_submenu'	=> 10,
			'tahun'		=> $_SESSION['tahun']
		);
		$data = array(	'title'		=> $this->title,
			'sidebar'	=> $this->sidebar,
			'menu'		=> $this->m_menu->menu(),
			'submenu'	=> $this->m_menu->submenu(),
			'isi' 		=> 'bab3/capaian_kinerja/capaian_kinerja',
			'capaianKinerja'	=> $this->m_submenu->capaianKinerja($where)						
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function addCapaianKinerja()
	{
		$where = array(	'konten'	=> $this->input->post('konten'),
			'id_submenu'	=> 10,
			'tahun'		=> $_SESSION['tahun']
		);

		$message = null;

		if(isset($where['konten'])){
			if(empty($where['konten'])){
				$message = '<span class="text-danger">Capaian kinerja tidak boleh kosong!</span>';
			}
			else{
				$add = $this->m_submenu->addCapaianKinerja($where);
				if($add){
					$message = '<span class="text-success">Capaian kinerja berhasil ditambahkan!</span>';
					header("Refresh: 1;url=". base_url()."submenu/capaiankinerja");

				}
			}
		}

		$row = $this->m_submenu->capaianKinerja($where = array('id_submenu' => $where['id_submenu'], 'tahun' => $where['tahun']))->num_rows();

		if ($row > 0) {
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab3/capaian_kinerja/capaian_kinerja',
				'capaianKinerja'	=> $this->m_submenu->capaianKinerja($where),
				'message'	=> $message

			);

		}
		else{
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab3/capaian_kinerja/add_capaian_kinerja',
				'message'		=> $message						
			);

		}

		$this->load->view('layouts/wrapper', $data);
	}

	public function editCapaianKinerja($id)
	{
		
		$where = array('id' => $id );

		$input = $this->input->post('update');

		$message = null;

		$row = $this->m_submenu->capaianKinerja($where)->num_rows();

		if ($row > 0) {
			if (isset($input)) {
				$konten = array('konten' => $this->input->post('konten') );
				if (empty($konten['konten'])) {
					$message = '<span class="text-danger">Capaian kinerja tidak boleh kosong!</span>';
				}
				else{
					$update = $this->m_submenu->updateCapaianKinerja($konten, $where);
					if ($update) {
						$message = '<span class="text-success">Capaian kinerja berhasil diubah!</span>';
						header("Refresh: 1;url=". base_url()."submenu/capaiankinerja");					
					}				
				}
			}

			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab3/capaian_kinerja/edit_capaian_kinerja',
				'edit'		=> $this->m_submenu->capaianKinerja($where),
				'message'	=> $message
			);		

			$this->load->view('layouts/wrapper', $data);
		}
		else{
			redirect('submenu/capaiankinerja');
		}
	}

	public function deleteCapaianKinerja($id)
	{
		$where = array('id' => $id );

		$row = $this->m_submenu->capaianKinerja($where)->num_rows();

		if ($row > 0) {
			$delete = $this->m_submenu->deleteCapaianKinerja($where);
			if ($delete) {
				$message = '<span class="text-success">Capaian kinerja berhasil dihapus!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab3/capaian_kinerja/capaian_kinerja',
					'capaianKinerja'	=> $this->m_submenu->capaianKinerja($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/capaiankinerja");
			}
		}
		else{
			redirect('submenu/capaiankinerja');
		}
	}

	public function endCapaianKinerja($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->capaianKinerja($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'y' );

			$update = $this->m_submenu->endCapaianKinerja($where, $selesai);

			if ($update) {

				$message = '<span class="text-success">Capaian kinerja telah ditandai selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab3/capaian_kinerja/capaian_kinerja',
					'capaianKinerja'	=> $this->m_submenu->capaianKinerja($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/capaiankinerja");
			}
		}
		else{
			redirect('submenu/capaiankinerja');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	public function unlockCapaianKinerja($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->capaianKinerja($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'n' );

			$update = $this->m_submenu->endCapaianKinerja($where, $selesai);

			if ($update) {
				
				$message = '<span class="text-success">Capaian kinerja telah dikembalikan ke status belum selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab3/capaian_kinerja/capaian_kinerja',
					'capaianKinerja'	=> $this->m_submenu->capaianKinerja($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/capaiankinerja");
			}
		}
		else{
			redirect('submenu/capaiankinerja');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	// End of capaian kinerja

	// Start of evaluasi analisis

	public function evaluasiAnalisis()
	{
		$where = array(	'id_submenu'	=> 11,
			'tahun'		=> $_SESSION['tahun']
		);
		$data = array(	'title'		=> $this->title,
			'sidebar'	=> $this->sidebar,
			'menu'		=> $this->m_menu->menu(),
			'submenu'	=> $this->m_menu->submenu(),
			'isi' 		=> 'bab3/evaluasi_analisis/evaluasi_analisis',
			'evaluasiAnalisis'	=> $this->m_submenu->evaluasiAnalisis($where)						
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function addEvaluasiAnalisis()
	{
		$where = array(	'konten'	=> $this->input->post('konten'),
			'id_submenu'	=> 11,
			'tahun'		=> $_SESSION['tahun']
		);

		$message = null;

		if(isset($where['konten'])){
			if(empty($where['konten'])){
				$message = '<span class="text-danger">Evaluasi dan analisis capaian kinerja tidak boleh kosong!</span>';
			}
			else{
				$add = $this->m_submenu->addEvaluasiAnalisis($where);
				if($add){
					$message = '<span class="text-success">Evaluasi dan analisis capaian kinerja berhasil ditambahkan!</span>';
					header("Refresh: 1;url=". base_url()."submenu/evaluasianalisis");

				}
			}
		}

		$row = $this->m_submenu->evaluasiAnalisis($where = array('id_submenu' => $where['id_submenu'], 'tahun' => $where['tahun']))->num_rows();

		if ($row > 0) {
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab3/evaluasi_analisis/evaluasi_analisis',
				'evaluasiAnalisis'	=> $this->m_submenu->evaluasiAnalisis($where),
				'message'	=> $message

			);

		}
		else{
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab3/evaluasi_analisis/add_evaluasi_analisis',
				'message'		=> $message						
			);

		}

		$this->load->view('layouts/wrapper', $data);
	}

	public function editEvaluasiAnalisis($id)
	{
		
		$where = array('id' => $id );

		$input = $this->input->post('update');

		$message = null;

		$row = $this->m_submenu->evaluasiAnalisis($where)->num_rows();

		if ($row > 0) {
			if (isset($input)) {
				$konten = array('konten' => $this->input->post('konten') );
				if (empty($konten['konten'])) {
					$message = '<span class="text-danger">Evaluasi dan analisis capaian kinerja tidak boleh kosong!</span>';
				}
				else{
					$update = $this->m_submenu->updateEvaluasiAnalisis($konten, $where);
					if ($update) {
						$message = '<span class="text-success">Evaluasi dan analisis capaian kinerja berhasil diubah!</span>';
						header("Refresh: 1;url=". base_url()."submenu/evaluasianalisis");					
					}				
				}
			}

			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab3/evaluasi_analisis/edit_evaluasi_analisis',
				'edit'		=> $this->m_submenu->evaluasiAnalisis($where),
				'message'	=> $message
			);		

			$this->load->view('layouts/wrapper', $data);
		}
		else{
			redirect('submenu/evaluasianalisis');
		}
	}

	public function deleteEvaluasiAnalisis($id)
	{
		$where = array('id' => $id );

		$row = $this->m_submenu->evaluasiAnalisis($where)->num_rows();

		if ($row > 0) {
			$delete = $this->m_submenu->deleteEvaluasiAnalisis($where);
			if ($delete) {
				$message = '<span class="text-success">Evaluasi dan analisis capaian kinerja berhasil dihapus!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab3/evaluasi_analisis/evaluasi_analisis',
					'evaluasiAnalisis'	=> $this->m_submenu->evaluasiAnalisis($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/evaluasianalisis");
			}
		}
		else{
			redirect('submenu/evaluasianalisis');
		}
	}

	public function endEvaluasiAnalisis($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->evaluasiAnalisis($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'y' );

			$update = $this->m_submenu->endEvaluasiAnalisis($where, $selesai);

			if ($update) {

				$message = '<span class="text-success">Evaluasi dan analisis capaian kinerja telah ditandai selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab3/evaluasi_analisis/evaluasi_analisis',
					'evaluasiAnalisis'	=> $this->m_submenu->evaluasiAnalisis($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/evaluasianalisis");
			}
		}
		else{
			redirect('submenu/evaluasianalisis');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	public function unlockEvaluasiAnalisis($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->evaluasiAnalisis($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'n' );

			$update = $this->m_submenu->endEvaluasiAnalisis($where, $selesai);

			if ($update) {
				
				$message = '<span class="text-success">Evaluasi dan analisis capaian kinerja telah dikembalikan ke status belum selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab3/evaluasi_analisis/evaluasi_analisis',
					'evaluasiAnalisis'	=> $this->m_submenu->evaluasiAnalisis($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/evaluasianalisis");
			}
		}
		else{
			redirect('submenu/evaluasianalisis');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	// End of evaluasi analisis

	// Start of akuntabilitas anggaran

	public function akuntabilitasAnggaran()
	{
		$where = array(	'id_submenu'	=> 12,
			'tahun'		=> $_SESSION['tahun']
		);
		$data = array(	'title'		=> $this->title,
			'sidebar'	=> $this->sidebar,
			'menu'		=> $this->m_menu->menu(),
			'submenu'	=> $this->m_menu->submenu(),
			'isi' 		=> 'bab3/akuntabilitas_anggaran/akuntabilitas_anggaran',
			'akuntabilitasAnggaran'	=> $this->m_submenu->akuntabilitasAnggaran($where)						
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function addAkuntabilitasAnggaran()
	{
		$where = array(	'konten'	=> $this->input->post('konten'),
			'id_submenu'	=> 12,
			'tahun'		=> $_SESSION['tahun']
		);

		$message = null;

		if(isset($where['konten'])){
			if(empty($where['konten'])){
				$message = '<span class="text-danger">Akuntabilitas anggaran tidak boleh kosong!</span>';
			}
			else{
				$add = $this->m_submenu->addAkuntabilitasAnggaran($where);
				if($add){
					$message = '<span class="text-success">Akuntabilitas anggaran berhasil ditambahkan!</span>';
					header("Refresh: 1;url=". base_url()."submenu/akuntabilitasanggaran");

				}
			}
		}

		$row = $this->m_submenu->akuntabilitasAnggaran($where = array('id_submenu' => $where['id_submenu'], 'tahun' => $where['tahun']))->num_rows();

		if ($row > 0) {
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab3/akuntabilitas_anggaran/akuntabilitas_anggaran',
				'akuntabilitasAnggaran'	=> $this->m_submenu->akuntabilitasAnggaran($where),
				'message'	=> $message

			);

		}
		else{
			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab3/akuntabilitas_anggaran/add_akuntabilitas_anggaran',
				'message'		=> $message						
			);

		}

		$this->load->view('layouts/wrapper', $data);
	}

	public function editAkuntabilitasAnggaran($id)
	{
		
		$where = array('id' => $id );

		$input = $this->input->post('update');

		$message = null;

		$row = $this->m_submenu->akuntabilitasAnggaran($where)->num_rows();

		if ($row > 0) {
			if (isset($input)) {
				$konten = array('konten' => $this->input->post('konten') );
				if (empty($konten['konten'])) {
					$message = '<span class="text-danger">Akuntabilitas anggaran tidak boleh kosong!</span>';
				}
				else{
					$update = $this->m_submenu->updateAkuntabilitasAnggaran($konten, $where);
					if ($update) {
						$message = '<span class="text-success">Akuntabilitas anggaran berhasil diubah!</span>';
						header("Refresh: 1;url=". base_url()."submenu/akuntabilitasanggaran");					
					}				
				}
			}

			$data = array(	'title'		=> $this->title,
				'sidebar'	=> $this->sidebar,
				'menu'		=> $this->m_menu->menu(),
				'submenu'	=> $this->m_menu->submenu(),
				'isi' 		=> 'bab3/akuntabilitas_anggaran/edit_akuntabilitas_anggaran',
				'edit'		=> $this->m_submenu->akuntabilitasAnggaran($where),
				'message'	=> $message
			);		

			$this->load->view('layouts/wrapper', $data);
		}
		else{
			redirect('submenu/akuntabilitasanggaran');
		}
	}

	public function deleteAkuntabilitasAnggaran($id)
	{
		$where = array('id' => $id );

		$row = $this->m_submenu->akuntabilitasAnggaran($where)->num_rows();

		if ($row > 0) {
			$delete = $this->m_submenu->deleteAkuntabilitasAnggaran($where);
			if ($delete) {
				$message = '<span class="text-success">Akuntabilitas anggaran berhasil dihapus!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab3/akuntabilitas_anggaran/akuntabilitas_anggaran',
					'akuntabilitasAnggaran'	=> $this->m_submenu->akuntabilitasAnggaran($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/akuntabilitasanggaran");
			}
		}
		else{
			redirect('submenu/akuntabilitasanggaran');
		}
	}

	public function endAkuntabilitasAnggaran($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->akuntabilitasAnggaran($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'y' );

			$update = $this->m_submenu->endAkuntabilitasAnggaran($where, $selesai);

			if ($update) {

				$message = '<span class="text-success">Akuntabilitas anggaran telah ditandai selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab3/akuntabilitas_anggaran/akuntabilitas_anggaran',
					'akuntabilitasAnggaran'	=> $this->m_submenu->akuntabilitasAnggaran($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/akuntabilitasanggaran");
			}
		}
		else{
			redirect('submenu/akuntabilitasanggaran');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	public function unlockAkuntabilitasAnggaran($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_submenu->akuntabilitasAnggaran($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'n' );

			$update = $this->m_submenu->endAkuntabilitasAnggaran($where, $selesai);

			if ($update) {
				
				$message = '<span class="text-success">Akuntabilitas anggaran telah dikembalikan ke status belum selesai!</span>';
				$data = array(	'title'		=> $this->title,
					'sidebar'	=> $this->sidebar,
					'menu'		=> $this->m_menu->menu(),
					'submenu'	=> $this->m_menu->submenu(),
					'isi' 		=> 'bab3/akuntabilitas_anggaran/akuntabilitas_anggaran',
					'akuntabilitasAnggaran'	=> $this->m_submenu->akuntabilitasAnggaran($where),
					'message'	=> $message

				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."submenu/akuntabilitasanggaran");
			}
		}
		else{
			redirect('submenu/akuntabilitasanggaran');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	// End of akuntabilitas anggaran

	// End of  bab 3

	// Start of lampiran

	// Start of lampiran 1 (IKU)

	public function lampiran1()
	{
		$where = array(	'tahun'		=> $_SESSION['tahun'] );

		$message = null;

		$save_iku = $this->input->post('save_iku');
		

		if (isset($save_iku)) {
			$input = array('sasaran_strategis' => $this->input->post('sasaran_strategis'),
				'indikator_kinerja'	=> $this->input->post('indikator_kinerja')
			);

			$where = array('id' => $this->input->post('id') );

			$update = $this->m_submenu->updateIku($input, $where);

			if($update){
				$message = '<span class="text-success">Data IKU berhasil diubah!</span>';
			}
		}

		$save_sub_iku = $this->input->post('save_sub_iku');

		if (isset($save_sub_iku)) {
			$input = array(	'anggaran' 	=> $this->input->post('anggaran'),
				'target'	=> $this->input->post('target')
			);

			$where = array('id' => $this->input->post('id') );

			$update = $this->m_submenu->updateSubIku($input, $where);

			if($update){
				$message = '<span class="text-success">Data IKU berhasil diubah!</span>';
			}
		}

		$data = array(	'title'			=> $this->title,
			'sidebar'		=> $this->sidebar,
			'menu'			=> $this->m_menu->menu(),
			'submenu'		=> $this->m_menu->submenu(),
			'isi' 			=> 'lampiran/lampiran1/lampiran1',
			'lampiran1_a'	=> $this->m_submenu->lampiran1_a($where),					
			'lampiran1_b'	=> $this->m_submenu->lampiran1_b($where),					
			'lampiran1_c'	=> $this->m_submenu->lampiran1_c($where),					
			'countIku'		=> $this->m_submenu->countIku(),
			'message'		=> $message

		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function createTableIku()
	{
		$cek = $this->m_submenu->countIku();

		$count = $cek->num_rows();

		$message = null;

		if($count > 0){
			header("Refresh: 1;url=". base_url()."submenu/lampiran1");
		}
		else{

			$tahun = $_SESSION['tahun'];

			echo $tahun;

			$iku = $this->m_submenu->insertIku($tahun);
			$sub_iku = $this->m_submenu->insertSubIku();
			

			if($iku && $sub_iku){
				$message = '<span class="text-success">Table berhasil dibuat!</span>';
			}

		}

		$where = array(	'tahun'		=> $_SESSION['tahun'] );

		$data = array(	'title'		=> $this->title,
			'sidebar'	=> $this->sidebar,
			'menu'		=> $this->m_menu->menu(),
			'submenu'	=> $this->m_menu->submenu(),
			'isi' 		=> 'lampiran/lampiran1/lampiran1',
			'lampiran1_a'	=> $this->m_submenu->lampiran1_a($where),						
			'lampiran1_b'	=> $this->m_submenu->lampiran1_b($where),						
			'lampiran1_c'	=> $this->m_submenu->lampiran1_c($where),						
			'countIku'	=> $this->m_submenu->countIku(),
			'message'	=> $message
		);		

		$this->load->view('layouts/wrapper', $data);
	}

	public function deleteIku()
	{

		$where = array(	'tahun'		=> $_SESSION['tahun'] );
		
		$id_program = array('id_program' => $this->input->post('id_program') );

		$tahun = $_SESSION['tahun'];

		$delete_iku = $this->m_submenu->deleteIku($tahun);

		foreach ($id_program as $ip) {
			$delete_sub_iku[] = $this->m_submenu->deleteSubIku($ip);
		}

		if($delete_sub_iku){
			$message = '<span class="text-success">IKU berhasil dihapus!</span>';
		}

		$data = array(	'title'		=> $this->title,
			'sidebar'	=> $this->sidebar,
			'menu'		=> $this->m_menu->menu(),
			'submenu'	=> $this->m_menu->submenu(),
			'isi' 		=> 'lampiran/lampiran1/lampiran1',
			'lampiran1_a'	=> $this->m_submenu->lampiran1_a($where),						
			'lampiran1_b'	=> $this->m_submenu->lampiran1_b($where),						
			'lampiran1_c'	=> $this->m_submenu->lampiran1_c($where),						
			'countIku'	=> $this->m_submenu->countIku(),
			'message'	=> $message,
		);		

		$this->load->view('layouts/wrapper', $data);

	}
	// End of lampiran 1 (IKU)

	// End of lampiran
}