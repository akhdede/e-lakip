<?php 
class M_dashboard extends CI_Model
{
	// Start model untuk dashboard

	public function menu()
	{
		$this->db->select('menu.id, menu.nama, isi_menu.selesai');
		$this->db->from('menu');
		$this->db->join('isi_menu', 'isi_menu.id_menu = menu.id', 'left');
		$this->db->order_by('menu.id asc');
		return $this->db->get();
	}

	public function submenu()
	{
		$this->db->select('submenu.id, submenu.nama, submenu.id_menu, isi_submenu.selesai');
		$this->db->from('submenu');
		$this->db->join('isi_submenu', 'isi_submenu.id_submenu = submenu.id', 'left');
		return $this->db->get();
	}

	public function singleMenu()
	{
		return $this->db->query("select id from menu where id not in(select id_menu from submenu)");
	}

	public function persenSelesai()
	{
		return $this->db->query("select((select(select count(nama) from menu where id in(select id_menu from isi_menu where selesai='y'))+(select count(nama) from submenu where id in(select id_submenu from isi_submenu where selesai='y'))) / (select((select count(nama) from menu where id not in(select id_menu from submenu)) + (select count(nama) from submenu))) * 100) as persen");
	}

	public function persenSedang()
	{
		return $this->db->query("select((select(select count(nama) from menu where id in(select id_menu from isi_menu where selesai='n'))+(select count(nama) from submenu where id in(select id_submenu from isi_submenu where selesai='n'))) / (select((select count(nama) from menu where id not in(select id_menu from submenu)) + (select count(nama) from submenu))) * 100) as persen");
	}

	public function persenBelum()
	{
		return $this->db->query("select(((select((select count(nama) from menu where id not in(select id_menu from submenu)) + (select count(nama) from submenu))) - (select(select count(nama) from menu where id in(select id_menu from isi_menu where selesai='y'))+(select count(nama) from submenu where id in(select id_submenu from isi_submenu where selesai='y'))) - (select(select count(nama) from menu where id in(select id_menu from isi_menu where selesai='n'))+(select count(nama) from submenu where id in(select id_submenu from isi_submenu where selesai='n')))) / (select((select count(nama) from menu where id not in(select id_menu from submenu)) + (select count(nama) from submenu))) * 100) as persen");
	}	
}
 ?>