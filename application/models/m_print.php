<?php 
class M_print extends CI_Model
{
	// Start model untuk dashboard

	public function menu()
	{
		$this->db->select('menu.id, menu.nama, isi_menu.konten');
		$this->db->from('menu');
		$this->db->join('isi_menu', 'isi_menu.id_menu = menu.id', 'left');
		$this->db->order_by('menu.id asc');
		return $this->db->get();
	}

	public function submenu()
	{
		$this->db->select('submenu.id, submenu.nama, submenu.id_menu, isi_submenu.konten');
		$this->db->from('submenu');
		$this->db->join('isi_submenu', 'isi_submenu.id_submenu = submenu.id', 'left');
		return $this->db->get();
	}
}
 ?>