<?php 
class M_submenu extends CI_Model
{
	
	// Start model untuk latar belakang

	public function latarBelakang($where)
	{
		return $this->db->get_where('isi_submenu', $where);
	}

	public function addLatarBelakang($where)
	{
		return $this->db->insert('isi_submenu', $where);
	}

	public function updateLatarBelakang($konten, $where)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $konten);		
	}

	public function deleteLatarBelakang($where)
	{
		$this->db->where($where);
		return $this->db->delete('isi_submenu');
	}

	public function endLatarBelakang($where, $selesai)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $selesai);
	}

	// End model untuk latar belakang	

	// Start model untuk dasar hukum

	public function dasarHukum($where)
	{
		return $this->db->get_where('isi_submenu', $where);
	}

	public function addDasarHukum($where)
	{
		return $this->db->insert('isi_submenu', $where);
	}

	public function updateDasarHukum($konten, $where)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $konten);		
	}

	public function deleteDasarHukum($where)
	{
		$this->db->where($where);
		return $this->db->delete('isi_submenu');
	}

	public function endDasarHukum($where, $selesai)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $selesai);
	}

	// End model untuk dasar hukum

	// Start model untuk tupoksi

	public function tupoksi($where)
	{
		return $this->db->get_where('isi_submenu', $where);
	}

	public function addTupoksi($where)
	{
		return $this->db->insert('isi_submenu', $where);
	}

	public function updateTupoksi($konten, $where)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $konten);		
	}

	public function deleteTupoksi($where)
	{
		$this->db->where($where);
		return $this->db->delete('isi_submenu');
	}

	public function endTupoksi($where, $selesai)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $selesai);
	}

	// End model untuk tupoksi
	
	// Start model untuk struktur orangisasi

	public function strukturOrganisasi($where)
	{
		return $this->db->get_where('isi_submenu', $where);
	}

	public function addStrukturOrganisasi($where)
	{
		return $this->db->insert('isi_submenu', $where);
	}

	public function updateStrukturOrganisasi($konten, $where)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $konten);		
	}

	public function deleteStrukturOrganisasi($where)
	{
		$this->db->where($where);
		return $this->db->delete('isi_submenu');
	}

	public function endStrukturOrganisasi($where, $selesai)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $selesai);
	}

	// End model untuk struktur organisasi
	
	// Start model untuk visi misi

	public function visiMisi($where)
	{
		return $this->db->get_where('isi_submenu', $where);
	}

	public function addVisiMisi($where)
	{
		return $this->db->insert('isi_submenu', $where);
	}

	public function updateVisiMisi($konten, $where)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $konten);		
	}

	public function deleteVisiMisi($where)
	{
		$this->db->where($where);
		return $this->db->delete('isi_submenu');
	}

	public function endVisiMisi($where, $selesai)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $selesai);
	}

	// End model untuk visi misi

	// Start model untuk tujuan sasaran

	public function tujuanSasaran($where)
	{
		return $this->db->get_where('isi_submenu', $where);
	}

	public function addTujuanSasaran($where)
	{
		return $this->db->insert('isi_submenu', $where);
	}

	public function updateTujuanSasaran($konten, $where)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $konten);		
	}

	public function deleteTujuanSasaran($where)
	{
		$this->db->where($where);
		return $this->db->delete('isi_submenu');
	}

	public function endTujuanSasaran($where, $selesai)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $selesai);
	}

	// End model untuk tujuan sasaran

	// Start model untuk arah kebijakan umum

	public function arahKebijakanUmum($where)
	{
		return $this->db->get_where('isi_submenu', $where);
	}

	public function addArahKebijakanUmum($where)
	{
		return $this->db->insert('isi_submenu', $where);
	}

	public function updateArahKebijakanUmum($konten, $where)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $konten);		
	}

	public function deleteArahKebijakanUmum($where)
	{
		$this->db->where($where);
		return $this->db->delete('isi_submenu');
	}

	public function endArahKebijakanUmum($where, $selesai)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $selesai);
	}

	// End model untuk arah kebijakan umum

	// Start model untuk rencana kinerja

	public function rencanaKinerja($where)
	{
		return $this->db->get_where('isi_submenu', $where);
	}

	public function addRencanaKinerja($where)
	{
		return $this->db->insert('isi_submenu', $where);
	}

	public function updateRencanaKinerja($konten, $where)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $konten);		
	}

	public function deleteRencanaKinerja($where)
	{
		$this->db->where($where);
		return $this->db->delete('isi_submenu');
	}

	public function endRencanaKinerja($where, $selesai)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $selesai);
	}

	// End model untuk rencana kinerja

	// Start model untuk cara capai tujuan sasaran

	public function caraCapaiTujuanSasaran($where)
	{
		return $this->db->get_where('isi_submenu', $where);
	}

	public function addCaraCapaiTujuanSasaran($where)
	{
		return $this->db->insert('isi_submenu', $where);
	}

	public function updateCaraCapaiTujuanSasaran($konten, $where)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $konten);		
	}

	public function deleteCaraCapaiTujuanSasaran($where)
	{
		$this->db->where($where);
		return $this->db->delete('isi_submenu');
	}

	public function endCaraCapaiTujuanSasaran($where, $selesai)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $selesai);
	}

	// End model untuk cara capai tujuan sasaran
}