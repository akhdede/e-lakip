<?php 
class M_pk extends CI_Model
{
	public function addProgram($where)
	{
		return $this->db->insert('program', $where);
	}

	public function viewProgram()
	{
		return $this->db->get('program');
	}

	public function cekProgram($where)
	{
		return $this->db->get_where('program', $where);
	}

	public function deleteProgram($where)
	{
		$this->db->where($where);
		return $this->db->delete('program');
	}

	public function updateProgram($nama, $where)
	{
		$this->db->where($where);
		return $this->db->update('program', $nama);
	}

	public function viewKegiatan()
	{
		return $this->db->get('kegiatan');
	}

	public function addKegiatan($insert)
	{
		return $this->db->insert('kegiatan', $insert);
	}

	public function cekKegiatan($where)
	{
		return $this->db->get_where('kegiatan', $where);
	}

	public function deleteKegiatan($where)
	{
		$this->db->where($where);
		return $this->db->delete('kegiatan');
	}

	public function updateKegiatan($nama, $where)
	{
		$this->db->where($where);
		return $this->db->update('kegiatan', $nama);
	}


}

?>