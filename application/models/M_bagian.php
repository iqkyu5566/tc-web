<?php
class M_bagian extends CI_model
{
	function tampil_bagian()
	{
		$this->db->order_by('id_bagian','DESC');
		$data=$this->db->get("bagian");
		return $data->result_array();
	}
	function simpan_bagian($inputan)
	{
		$disimpan=elements(array('nama_bagian','tugas_bagian','no_bagian'),$inputan);
		$this->db->insert("bagian",$disimpan);
	}

	function ambil_bagian($id)
	{
		$this->db->where("id_bagian",$id);
		$ambil=$this->db->get("bagian");
		return $ambil->row_array();
	}

	function ubah_bagian($inputan,$id)
	{
		$disimpan=elements(array('nama_bagian','tugas_bagian','no_bagian'),$inputan);

		$this->db->where("id_bagian",$id);
		$this->db->update("bagian",$disimpan);
	}

	function hapus_bagian($id)
	{
		$this->db->where("id_bagian",$id);
		$this->db->delete("bagian");
	}
}