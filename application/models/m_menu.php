<?php 
class M_menu extends CI_Model
{
	// Start model untuk sidebar

	public function menu()
	{
		return $this->db->get('menu');
	}

	public function submenu()
	{
		return $this->db->get('submenu');
	}

	// End model untuk sidebar

	// Start model untuk kata pengantar

	public function kataPengantar($where)
	{
		return $this->db->get_where('isi_menu', $where);
	}

	public function addKataPengantar($where)
	{
		return $this->db->insert('isi_menu', $where);
	}

	public function updateKataPengantar($konten, $where)
	{
		$this->db->where($where);
		return $this->db->update('isi_menu', $konten);		
	}

	public function deleteKataPengantar($where)
	{
		$this->db->where($where);
		return $this->db->delete('isi_menu');
	}

	public function endKataPengantar($where, $selesai)
	{
		$this->db->where($where);
		return $this->db->update('isi_menu', $selesai);
	}

	// End model untuk kata pengantar

	// Start model untuk daftar isi

	public function daftarIsi($where)
	{
		return $this->db->get_where('isi_menu', $where);
	}

	public function addDaftarIsi($where)
	{
		return $this->db->insert('isi_menu', $where);
	}

	public function updateDaftarIsi($konten, $where)
	{
		$this->db->where($where);
		return $this->db->update('isi_menu', $konten);		
	}

	public function deleteDaftarIsi($where)
	{
		$this->db->where($where);
		return $this->db->delete('isi_menu');
	}

	public function endDaftarIsi($where, $selesai)
	{
		$this->db->where($where);
		return $this->db->update('isi_menu', $selesai);
	}

	// End model untuk daftar isi

	// Start model untuk bab 4

	public function bab4($where)
	{
		return $this->db->get_where('isi_menu', $where);
	}

	public function addBab4($where)
	{
		return $this->db->insert('isi_menu', $where);
	}

	public function updateBab4($konten, $where)
	{
		$this->db->where($where);
		return $this->db->update('isi_menu', $konten);		
	}

	public function deleteBab4($where)
	{
		$this->db->where($where);
		return $this->db->delete('isi_menu');
	}

	public function endBab4($where, $selesai)
	{
		$this->db->where($where);
		return $this->db->update('isi_menu', $selesai);
	}


	// End model untuk bab 4
}
 ?>