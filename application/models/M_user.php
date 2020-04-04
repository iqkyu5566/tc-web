<?php
class M_user extends CI_model
{
	function login_level_user($data)
	{
		$user = $data['username'];
		$pass = $data['password'];

		$this->db->where("username",$user);
		$this->db->where("password",$pass);

		$get = $this->db->get("user");

		if ($get->num_rows() == 1) 
		{

			return $get->result();
		}
		else
		{
			return false;
		}
	}

	function tampil_user()
	{
		$this->db->select("*");
		$this->db->join("bagian","user.id_bagian=bagian.id_bagian");
		$this->db->order_by('id_user','desc');
		$data=$this->db->get("user");
		return $data->result_array();
	}
	function simpan_user($inputan)
	{
		$config['upload_path']          = './gambar/user';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] 		= TRUE;
		$this->upload->initialize($config);

		$this->upload->do_upload('foto_user');
		$dataupload = $this->upload->data();
		$inputan['foto_user']=$dataupload['file_name'];

		$inputan['status_user']="Belum Aktif";
		$disimpan=elements(array('username','password','nama_lengkap','level_user','id_bagian','status_user','foto_user'),$inputan);

		$this->db->insert("user",$disimpan);
	}

	function update($id, $data)
	{
		$this->db->where("id_user", $id);
		$this->db->update("user", $data);
	}

	function ambil_user($id)
	{
		$this->db->order_by('id_user','desc');
		$this->db->where("id_user",$id);
		$ambil=$this->db->get("user");
		return $ambil->row_array();
	}
	function ubah_user($inputan,$id)
	{
		{
			$config['upload_path']          = './gambar/user';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['encrypt_name'] 		= TRUE;
			$this->upload->initialize($config);
			//mengambil peritem
			$data_user=$this->ambil_user($id);

			if ($this->upload->do_upload('foto_user'))
			{
				$foto_user = $data_user['foto_user'];
			//hapus file lama foto
				if (file_exists("./gambar/user/$foto_user") AND $foto_user !="")
				{
					unlink("./gambar/user/$foto_user");
				}
			//mengambil file yang telah

				$data_upload= $this->upload->data();
				$inputan['foto_user']=$data_upload['file_name'];

				$inputan['status_user']="Belum Aktif";
				$disimpan=elements(array('username','password','nama_lengkap','level_user','id_bagian','status_user','foto_user'),$inputan);
			} 
			else 
			{
				$inputan['status_user']="Belum Aktif";

				$disimpan=elements(array('username','password','nama_lengkap','level_user','id_bagian','status_user'),$inputan);
			}
			$this->db->where("id_user",$id);
			$this->db->update("user",$disimpan);
		}
	}
	function hapus_user($id)
	{
		$this->db->where("id_user",$id);
		$this->db->delete("user");
	}



	function ubah_password_user($inputan,$id)
	{
		
		if (!empty($inputan['password']))
		{
			$inputan=elements(array("username","nama_user","password"),$inputan);
		}
		else
		{
			$inputan=elements(array("username","nama_user"),$inputan);
		}
		$this->db->where("id_user",$id);
		$this->db->update("user",$inputan);
	}
}