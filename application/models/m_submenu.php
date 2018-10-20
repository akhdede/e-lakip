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
	
	// Start model untuk capaian kinerja

	public function capaianKinerja($where)
	{
		return $this->db->get_where('isi_submenu', $where);
	}

	public function addCapaianKinerja($where)
	{
		return $this->db->insert('isi_submenu', $where);
	}

	public function updateCapaianKinerja($konten, $where)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $konten);		
	}

	public function deleteCapaianKinerja($where)
	{
		$this->db->where($where);
		return $this->db->delete('isi_submenu');
	}

	public function endCapaianKinerja($where, $selesai)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $selesai);
	}

	// End model untuk capaian kinerja
	
	// Start model untuk evaluasi analisis

	public function evaluasiAnalisis($where)
	{
		return $this->db->get_where('isi_submenu', $where);
	}

	public function addEvaluasiAnalisis($where)
	{
		return $this->db->insert('isi_submenu', $where);
	}

	public function updateEvaluasiAnalisis($konten, $where)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $konten);		
	}

	public function deleteEvaluasiAnalisis($where)
	{
		$this->db->where($where);
		return $this->db->delete('isi_submenu');
	}

	public function endEvaluasiAnalisis($where, $selesai)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $selesai);
	}

	// End model untuk evaluasi analisis
	
	// Start model untuk akuntabilitas anggaran

	public function akuntabilitasAnggaran($where)
	{
		return $this->db->get_where('isi_submenu', $where);
	}

	public function addAkuntabilitasAnggaran($where)
	{
		return $this->db->insert('isi_submenu', $where);
	}

	public function updateAkuntabilitasAnggaran($konten, $where)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $konten);		
	}

	public function deleteAkuntabilitasAnggaran($where)
	{
		$this->db->where($where);
		return $this->db->delete('isi_submenu');
	}

	public function endAkuntabilitasAnggaran($where, $selesai)
	{
		$this->db->where($where);
		return $this->db->update('isi_submenu', $selesai);
	}

	// End model untuk akuntabilitas anggaran

	// Start model untuk lampiran1

	public function lampiran1_a($where) //model untuk sasaran strategis, indikator kinerja, nama program dan total anggaran program
	{
		return $this->db->query("SELECT `iku`.`id`,`iku`.`tahun` as `tahun`,`iku`.`sasaran_strategis`,`iku`.`indikator_kinerja`,`iku`.`id_program`,`program`.`nama` as program FROM `iku` JOIN `program` ON `iku`.`id_program`=`program`.`id`");
	}

	public function lampiran1_b($where) //model untuk target, nama kegiatan, anggaran kegiatan
	{
		return $this->db->query("SELECT `iku`.`tahun` as `tahun`,`sub_iku`.`id`,`sub_iku`.`target`,`sub_iku`.`id_iku`,`program`.`nama` as program,`kegiatan`.`nama` AS kegiatan,`sub_iku`.`anggaran` FROM `iku` JOIN `sub_iku` ON `iku`.`id`=`sub_iku`.`id_iku` JOIN `program` ON `program`.`id`=`sub_iku`.`id_program` JOIN `kegiatan` ON `kegiatan`.`id`=`sub_iku`.`id_kegiatan`");
	}

	public function lampiran1_c($where)
	{
		return $this->db->query("SELECT `sub_iku`.`id_program` AS `id_program`, sum(`sub_iku`.`anggaran`) AS `anggaran` FROM `sub_iku` JOIN `iku` ON `sub_iku`.`id_iku`=`iku`.`id` JOIN `program` ON `program`.`id`=`sub_iku`.`id_program` GROUP BY `sub_iku`.`id_program`");
	}

	public function countIku()
	{
		return $this->db->query("SELECT `iku`.`id` FROM `iku` JOIN `sub_iku` ON `iku`.`id`=`sub_iku`.`id_iku`");
	}

	public function insertIku($tahun)
	{
		return $this->db->query("INSERT INTO `iku`(`id_program`, `tahun`) SELECT `program`.`id`, ($tahun) FROM `program`");
	}

	public function insertSubIku()
	{
		return $this->db->query("INSERT INTO `sub_iku`(`id_kegiatan`,`id_program`,`id_iku`) SELECT `kegiatan`.`id` AS `id_kegiatan`, `iku`.`id_program`, `iku`.`id` AS `id_iku` FROM `kegiatan` JOIN `iku` ON `kegiatan`.`id_program`=`iku`.`id_program`");
	}

	public function updateIku($input, $where)
	{
		$this->db->where($where);
		return $this->db->update('iku', $input);
	}

	public function updateSubIku($input, $where)
	{
		$this->db->where($where);
		return $this->db->update('sub_iku', $input);
	}

	public function deleteIku($tahun)
	{
		$this->db->where('tahun', $tahun);
		return $this->db->delete('iku');
	}

	public function deleteSubIku($id_program)
	{
		$this->db->where('id_program', $id_program);
		return $this->db->delete('sub_iku');
	}

	// End model untuk lampiran1
}