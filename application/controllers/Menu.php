<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_menu');

		$this->sidebar = 'layouts/sidebar';
		$this->title = 'E - L A K I P';

		if($this->session->has_userdata('logged_in') == FALSE){
			redirect('user');
		}		
	}

	public function index()
	{
		redirect('menu/katapengantar');
	}

	// Upload local image

	public function uploadImage()
	{
        $config['upload_path'] = 'assets/image';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')) {
            $this->output->set_header('HTTP/1.0 500 Server Error');
            exit;
        } else {
            $file = $this->upload->data();
            $this->output
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode(['location' => base_url().'assets/image/'.$file['file_name']]))
                ->_display();
            exit;
        }
	}

	// End upload image

	// Start of kata pengantar

	public function kataPengantar()
	{
		$where = array(	'id_menu'	=> 1,
						'tahun'		=> $_SESSION['tahun']
		);
		$data = array(	'title'		=> $this->title,
						'sidebar'	=> $this->sidebar,
						'menu'		=> $this->m_menu->menu(),
						'submenu'	=> $this->m_menu->submenu(),
						'isi' 		=> 'kata_pengantar/kata_pengantar',
						'kataPengantar'	=> $this->m_menu->kataPengantar($where)						
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function addKataPengantar()
	{
		$where = array(	'konten'	=> $this->input->post('konten'),
						'id_menu'	=> 1,
						'tahun'		=> $_SESSION['tahun']
		);

		$message = null;

		if(isset($where['konten'])){
			if(empty($where['konten'])){
				$message = '<span class="text-danger">Form kata pengantar tidak boleh kosong!</span>';
			}
			else{
				$add = $this->m_menu->addKataPengantar($where);
				if($add){
					$message = '<span class="text-success">Kata pengantar berhasil ditambahkan!</span>';
					header("Refresh: 1;url=". base_url()."menu/katapengantar");

				}
			}
		}

		$row = $this->m_menu->kataPengantar($where = array('id_menu' => $where['id_menu'], 'tahun' => $where['tahun']))->num_rows();

		if ($row > 0) {
			$data = array(	'title'		=> $this->title,
							'sidebar'	=> $this->sidebar,
							'menu'		=> $this->m_menu->menu(),
							'submenu'	=> $this->m_menu->submenu(),
							'isi' 		=> 'kata_pengantar/kata_pengantar',
							'kataPengantar'	=> $this->m_menu->kataPengantar($where),
							'message'	=> $message
							
			);

		}
		else{
			$data = array(	'title'		=> $this->title,
							'sidebar'	=> $this->sidebar,
							'menu'		=> $this->m_menu->menu(),
							'submenu'	=> $this->m_menu->submenu(),
							'isi' 		=> 'kata_pengantar/add_kata_pengantar',
							'message'		=> $message						
			);

		}

		$this->load->view('layouts/wrapper', $data);
	}

	public function editKataPengantar($id)
	{
		
		$where = array('id' => $id );

		$input = $this->input->post('update');

		$message = null;

		$row = $this->m_menu->kataPengantar($where)->num_rows();

		if ($row > 0) {
			if (isset($input)) {
				$konten = array('konten' => $this->input->post('konten') );
				if (empty($konten['konten'])) {
					$message = '<span class="text-danger">Kata pengantar tidak boleh kosong!</span>';
				}
				else{
					$update = $this->m_menu->updateKataPengantar($konten, $where);
					if ($update) {
						$message = '<span class="text-success">Kata pengantar berhasil diubah!</span>';
						header("Refresh: 1;url=". base_url()."menu/katapengantar");					
					}				
				}
			}

			$data = array(	'title'		=> $this->title,
							'sidebar'	=> $this->sidebar,
							'menu'		=> $this->m_menu->menu(),
							'submenu'	=> $this->m_menu->submenu(),
							'isi' 		=> 'kata_pengantar/edit_kata_pengantar',
							'edit'		=> $this->m_menu->kataPengantar($where),
							'message'		=> $message
			);		

			$this->load->view('layouts/wrapper', $data);
		}
		else{
			redirect('menu/katapengantar');
		}
	}

	public function deleteKataPengantar($id)
	{
		$where = array('id' => $id );

		$row = $this->m_menu->kataPengantar($where)->num_rows();

		if ($row > 0) {
			$delete = $this->m_menu->deleteKataPengantar($where);
			if ($delete) {
				$message = '<span class="text-success">Kata pengantar berhasil dihapus!</span>';
				$data = array(	'title'		=> $this->title,
								'sidebar'	=> $this->sidebar,
								'menu'		=> $this->m_menu->menu(),
								'submenu'	=> $this->m_menu->submenu(),
								'isi' 		=> 'kata_pengantar/kata_pengantar',
								'kataPengantar'	=> $this->m_menu->kataPengantar($where),
								'message'	=> $message
								
				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."menu/katapengantar");
			}
		}
		else{
			redirect('menu/katapengantar');
		}
	}

	public function endKataPengantar($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_menu->kataPengantar($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'y' );

			$update = $this->m_menu->endKataPengantar($where, $selesai);

			if ($update) {

				$message = '<span class="text-success">Kata pengantar telah ditandai selesai!</span>';
				$data = array(	'title'		=> $this->title,
								'sidebar'	=> $this->sidebar,
								'menu'		=> $this->m_menu->menu(),
								'submenu'	=> $this->m_menu->submenu(),
								'isi' 		=> 'kata_pengantar/kata_pengantar',
								'kataPengantar'	=> $this->m_menu->kataPengantar($where),
								'message'	=> $message
								
				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."menu/katapengantar");
			}
		}
		else{
			redirect('menu/katapengantar');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	public function unlockKataPengantar($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_menu->kataPengantar($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'n' );

			$update = $this->m_menu->endKataPengantar($where, $selesai);

			if ($update) {
				
				$message = '<span class="text-success">Kata pengantar telah dikembalikan ke status belum selesai!</span>';
				$data = array(	'title'		=> $this->title,
								'sidebar'	=> $this->sidebar,
								'menu'		=> $this->m_menu->menu(),
								'submenu'	=> $this->m_menu->submenu(),
								'isi' 		=> 'kata_pengantar/kata_pengantar',
								'kataPengantar'	=> $this->m_menu->kataPengantar($where),
								'message'	=> $message
								
				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."menu/katapengantar");
			}
		}
		else{
			redirect('menu/katapengantar');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	// End of kata pengantar

	// Start of daftar isi

	public function daftarIsi()
	{
		$where = array(	'id_menu'	=> 2,
						'tahun'		=> $_SESSION['tahun']
		);
		$data = array(	'title'		=> $this->title,
						'sidebar'	=> $this->sidebar,
						'menu'		=> $this->m_menu->menu(),
						'submenu'	=> $this->m_menu->submenu(),
						'isi' 		=> 'daftar_isi/daftar_isi',
						'daftarIsi'	=> $this->m_menu->daftarIsi($where)
						
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function addDaftarIsi()
	{
		$where = array(	'konten'	=> $this->input->post('konten'),
						'id_menu'	=> 2,
						'tahun'		=> $_SESSION['tahun']
		);

		$message = null;

		if(isset($where['konten'])){
			if(empty($where['konten'])){
				$message = '<span class="text-danger">Daftar isi tidak boleh kosong!</span>';
			}
			else{
				$add = $this->m_menu->addDaftarIsi($where);
				if($add){
					$message = '<span class="text-success">Daftar isi berhasil ditambahkan!</span>';
					header("Refresh: 1;url=". base_url()."menu/daftarisi");

				}
			}
		}

		$row = $this->m_menu->daftarIsi($where = array('id_menu' => $where['id_menu'], 'tahun' => $where['tahun']))->num_rows();

		if ($row > 0) {
			$data = array(	'title'		=> $this->title,
							'sidebar'	=> $this->sidebar,
							'menu'		=> $this->m_menu->menu(),
							'submenu'	=> $this->m_menu->submenu(),
							'isi' 		=> 'daftar_isi/daftar_isi',
							'daftarIsi'	=> $this->m_menu->daftarIsi($where),
							'message'	=> $message
							
			);

		}
		else{
			$data = array(	'title'		=> $this->title,
							'sidebar'	=> $this->sidebar,
							'menu'		=> $this->m_menu->menu(),
							'submenu'	=> $this->m_menu->submenu(),
							'isi' 		=> 'daftar_isi/add_daftar_isi',
							'message'		=> $message						
			);

		}



		$this->load->view('layouts/wrapper', $data);
	}

	public function editDaftarIsi($id)
	{
		
		$where = array('id' => $id );

		$input = $this->input->post('update');

		$message = null;

		$row = $this->m_menu->daftarIsi($where)->num_rows();

		if ($row > 0) {
			if (isset($input)) {
				$konten = array('konten' => $this->input->post('konten') );
				if (empty($konten['konten'])) {
					$message = '<span class="text-danger">Daftar isi tidak boleh kosong!</span>';
				}
				else{
					$update = $this->m_menu->updateDaftarIsi($konten, $where);
					if ($update) {
						$message = '<span class="text-success">Daftar isi berhasil diubah!</span>';
						header("Refresh: 1;url=". base_url()."menu/daftarisi");					
					}				
				}
			}

			$data = array(	'title'		=> $this->title,
							'sidebar'	=> $this->sidebar,
							'menu'		=> $this->m_menu->menu(),
							'submenu'	=> $this->m_menu->submenu(),
							'isi' 		=> 'daftar_isi/edit_daftar_isi',
							'edit'		=> $this->m_menu->daftarIsi($where),
							'message'		=> $message
			);		

			$this->load->view('layouts/wrapper', $data);
		}
		else{
			redirect('menu/daftarisi');
		}
	}

	public function deleteDaftarIsi($id)
	{
		$where = array('id' => $id );

		$row = $this->m_menu->daftarIsi($where)->num_rows();

		if ($row > 0) {
			$delete = $this->m_menu->deleteDaftarIsi($where);
			if ($delete) {
				$message = '<span class="text-success">Daftar isi berhasil dihapus!</span>';
				$data = array(	'title'		=> $this->title,
								'sidebar'	=> $this->sidebar,
								'menu'		=> $this->m_menu->menu(),
								'submenu'	=> $this->m_menu->submenu(),
								'isi' 		=> 'daftar_isi/daftar_isi',
								'daftarIsi'	=> $this->m_menu->daftarIsi($where),
								'message'	=> $message
								
				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."menu/daftarisi");
			}
		}
		else{
			redirect('menu/daftarisi');
		}
	}

	public function endDaftarIsi($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_menu->daftarIsi($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'y' );

			$update = $this->m_menu->endDaftarIsi($where, $selesai);

			if ($update) {

				$message = '<span class="text-success">Daftar isi telah ditandai selesai!</span>';
				$data = array(	'title'		=> $this->title,
								'sidebar'	=> $this->sidebar,
								'menu'		=> $this->m_menu->menu(),
								'submenu'	=> $this->m_menu->submenu(),
								'isi' 		=> 'daftar_isi/daftar_isi',
								'daftarIsi'	=> $this->m_menu->daftarIsi($where),
								'message'	=> $message
								
				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."menu/daftarisi");
			}
		}
		else{
			redirect('menu/daftarisi');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	public function unlockDaftarIsi($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_menu->daftarIsi($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'n' );

			$update = $this->m_menu->endDaftarIsi($where, $selesai);

			if ($update) {
				
				$message = '<span class="text-success">Daftar isi telah dikembalikan ke status belum selesai!</span>';
				$data = array(	'title'		=> $this->title,
								'sidebar'	=> $this->sidebar,
								'menu'		=> $this->m_menu->menu(),
								'submenu'	=> $this->m_menu->submenu(),
								'isi' 		=> 'daftar_isi/daftar_isi',
								'daftarIsi'	=> $this->m_menu->kataPengantar($where),
								'message'	=> $message
								
				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."menu/daftarisi");
			}
		}
		else{
			redirect('menu/daftarisi');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	// End of daftar isi

	// Start of bab 4

	public function bab4()
	{
		$where = array(	'id_menu'	=> 6,
						'tahun'		=> $_SESSION['tahun']
		);
		$data = array(	'title'		=> $this->title,
						'sidebar'	=> $this->sidebar,
						'menu'		=> $this->m_menu->menu(),
						'submenu'	=> $this->m_menu->submenu(),
						'isi' 		=> 'bab4/bab4',
						'bab4'	=> $this->m_menu->bab4($where)
						
		);
		$this->load->view('layouts/wrapper', $data);
	}

	public function addBab4()
	{
		$where = array(	'konten'	=> $this->input->post('konten'),
						'id_menu'	=> 6,
						'tahun'		=> $_SESSION['tahun']
		);

		$message = null;

		if(isset($where['konten'])){
			if(empty($where['konten'])){
				$message = '<span class="text-danger">BAB IV tidak boleh kosong!</span>';
			}
			else{
				$add = $this->m_menu->addBab4($where);
				if($add){
					$message = '<span class="text-success">BAB IV berhasil ditambahkan!</span>';
					header("Refresh: 1;url=". base_url()."menu/bab4");

				}
			}
		}

		$row = $this->m_menu->bab4($where = array('id_menu' => $where['id_menu'], 'tahun' => $where['tahun']))->num_rows();

		if ($row > 0) {
			$data = array(	'title'		=> $this->title,
							'sidebar'	=> $this->sidebar,
							'menu'		=> $this->m_menu->menu(),
							'submenu'	=> $this->m_menu->submenu(),
							'isi' 		=> 'bab4/bab4',
							'bab4'	=> $this->m_menu->bab4($where),
							'message'	=> $message
							
			);

		}
		else{
			$data = array(	'title'		=> $this->title,
							'sidebar'	=> $this->sidebar,
							'menu'		=> $this->m_menu->menu(),
							'submenu'	=> $this->m_menu->submenu(),
							'isi' 		=> 'bab4/add_bab4',
							'message'		=> $message						
			);
		}

		$this->load->view('layouts/wrapper', $data);
	}

	public function editBab4($id)
	{
		
		$where = array('id' => $id );

		$input = $this->input->post('update');

		$message = null;

		$row = $this->m_menu->bab4($where)->num_rows();

		if ($row > 0) {
			if (isset($input)) {
				$konten = array('konten' => $this->input->post('konten') );
				if (empty($konten['konten'])) {
					$message = '<span class="text-danger">BAB IV tidak boleh kosong!</span>';
				}
				else{
					$update = $this->m_menu->updateBab4($konten, $where);
					if ($update) {
						$message = '<span class="text-success">BAB IV berhasil diubah!</span>';
						header("Refresh: 1;url=". base_url()."menu/bab4");					
					}				
				}
			}

			$data = array(	'title'		=> $this->title,
							'sidebar'	=> $this->sidebar,
							'menu'		=> $this->m_menu->menu(),
							'submenu'	=> $this->m_menu->submenu(),
							'isi' 		=> 'bab4/edit_bab4',
							'edit'		=> $this->m_menu->bab4($where),
							'message'		=> $message
			);		

			$this->load->view('layouts/wrapper', $data);
		}
		else{
			redirect('menu/bab4');
		}

	}

	public function deleteBab4($id)
	{
		$where = array('id' => $id );

		$row = $this->m_menu->daftarIsi($where)->num_rows();

		if ($row > 0) {
			$delete = $this->m_menu->deleteBab4($where);
			if ($delete) {
				$message = '<span class="text-success">BAB IV berhasil dihapus!</span>';
				$data = array(	'title'		=> $this->title,
								'sidebar'	=> $this->sidebar,
								'menu'		=> $this->m_menu->menu(),
								'submenu'	=> $this->m_menu->submenu(),
								'isi' 		=> 'bab4/bab4',
								'bab4'	=> $this->m_menu->bab4($where),
								'message'	=> $message
								
				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."menu/bab4");
			}
		}
		else{
			redirect('menu/bab4');
		}
	}

	public function endBab4($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_menu->bab4($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'y' );

			$update = $this->m_menu->endBab4($where, $selesai);

			if ($update) {

				$message = '<span class="text-success">BAB IV telah ditandai selesai!</span>';
				$data = array(	'title'		=> $this->title,
								'sidebar'	=> $this->sidebar,
								'menu'		=> $this->m_menu->menu(),
								'submenu'	=> $this->m_menu->submenu(),
								'isi' 		=> 'bab4/bab4',
								'bab4'	=> $this->m_menu->bab4($where),
								'message'	=> $message
								
				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."menu/bab4");
			}
		}
		else{
			redirect('menu/bab4');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	public function unlockBab4($id)
	{
		$where = array(	'id' => $id);

		$row = $this->m_menu->bab4($where)->num_rows();

		if ($row > 0) {

			$selesai = array('selesai' => 'n' );

			$update = $this->m_menu->endBab4($where, $selesai);

			if ($update) {
				
				$message = '<span class="text-success">BAB IV telah dikembalikan ke status belum selesai!</span>';
				$data = array(	'title'		=> $this->title,
								'sidebar'	=> $this->sidebar,
								'menu'		=> $this->m_menu->menu(),
								'submenu'	=> $this->m_menu->submenu(),
								'isi' 		=> 'bab4/bab4',
								'bab4'	=> $this->m_menu->bab4($where),
								'message'	=> $message
								
				);
				$this->load->view('layouts/wrapper', $data);
				header("Refresh: 1;url=". base_url()."menu/bab4");
			}
		}
		else{
			redirect('menu/bab4');
		}

		$this->load->view('layouts/wrapper', $data);

	}

	// End of bab 4

}