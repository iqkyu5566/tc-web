<?php
class M_pengaturan extends CI_model
{

	function tampil_pengaturan()
	{
		$this->db->order_by('id_pengaturan','desc');
		$data=$this->db->get("pengaturan");
		return $data->result_array();
	}

	function ambil_pengaturan($id)
	{
		$this->db->order_by('id_pengaturan','desc');
		$this->db->where("id_pengaturan",$id);
		$ambil=$this->db->get("pengaturan");
		return $ambil->row_array();
	}
	function ubah_pengaturan($inputan,$id,$logo,$logo_app2)
	{
		{
			$config['upload_path']          = './gambar/pengaturan';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['encrypt_name'] 		= TRUE;
			$this->upload->initialize($config);
			//mengambil peritem
			$data_pengaturan=$this->ambil_pengaturan($id);

			if ($this->upload->do_upload('logo_app1'))
			{
				$logo_app1 = $data_pengaturan['logo_app1'];
			//hapus file lama foto
				if (file_exists("./gambar/pengaturan/$logo_app1") AND $logo_app1 !="")
				{
					unlink("./gambar/pengaturan/$logo_app1");
				}
			//mengambil file yang telah

				$data_upload= $this->upload->data();
				$inputan['logo_app1']=$data_upload['file_name'];

				$disimpan=elements(array('nama_aplikasi','ket_aplikasi','titel_aplikasi','nama_perusahaan','alamat_perusahaan','npwp_perusahaan','email_perusahaan','wa_perusahaan','rek_perusahaan','versi_app','url_youtube','url_facebook','url_instagram','logo_app1','logo_app2'),$inputan);
			} 

			elseif ($this->upload->do_upload('logo_app2')) 

			{

				$logo_app2=['logo_app2'];
				if (file_exists("./gambar/pengaturan/$logo_app2") AND $logo_app2 !="")
				{
					unlink("./gambar/pengaturan/$logo_app2");
				}

				$logo_app2= $this->upload->data();
				$inputan['logo_app2']=$logo_app2['file_name'];
				$disimpan=elements(array('logo_app2'),$inputan);
			}

			else 
			{

				$disimpan=elements(array('nama_aplikasi','ket_aplikasi','titel_aplikasi','nama_perusahaan','alamat_perusahaan','npwp_perusahaan','email_perusahaan','wa_perusahaan','rek_perusahaan','versi_app','url_youtube','url_facebook','url_instagram'),$inputan);
			}
			$this->db->where("id_pengaturan",$id);
			$this->db->update("pengaturan",$disimpan);
		}
	}
	function hapus_pengaturan($id)
	{
		$this->db->where("id_pengaturan",$id);
		$this->db->delete("pengaturan");
	}

}