<?php 
class User extends CI_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("template");
		$this->load->library("form_validation");
		$this->load->model("M_pengaturan");
		$this->load->model("M_user");
		$this->load->model("M_bagian");




	}


	function index()
	{

			$data_pengaturan =$this->M_pengaturan->ambil_pengaturan(1);
		$data	= 	array(
			'nama_aplikasi'		=> $data_pengaturan['nama_aplikasi'],
			'titel_aplikasi'	=> $data_pengaturan['titel_aplikasi'],
			'ket_aplikasi'		=> $data_pengaturan['ket_aplikasi'],
			'nama_perusahaan'	=> $data_pengaturan['nama_perusahaan'],
			'alamat_perusahaan'	=> $data_pengaturan['alamat_perusahaan'],
			'npwp_perusahaan'	=> $data_pengaturan['npwp_perusahaan'],
			'email_perusahaan'	=> $data_pengaturan['email_perusahaan'],
			'wa_perusahaan'		=> $data_pengaturan['wa_perusahaan'],
			'rek_perusahaan'	=> $data_pengaturan['rek_perusahaan'],
			'versi_app'			=> $data_pengaturan['versi_app'],
			'url_youtube'		=> $data_pengaturan['url_youtube'],
			'url_facebook'		=> $data_pengaturan['url_facebook'],
			'url_instagram'		=> $data_pengaturan['url_instagram'],
			'logo_app1'			=> $data_pengaturan['logo_app1'],
			'logo_app2'			=> $data_pengaturan['logo_app2'],
		);
 

		$this->form_validation->set_rules("nama_lengkap","Nama Lengkap","trim|required");
		$this->form_validation->set_rules("username","Username","trim|required");
		$this->form_validation->set_rules("password","Password","trim|required");
		$this->form_validation->set_rules("password2","Konfirmasi Password","required|matches[password]");

		//membuat pesan dari setiap kolom 
		$this->form_validation->set_message("required","{field}, tidak boleh kosong");
		$this->form_validation->set_message("matches","{field}, Password tidak cocok");


		if ($this->form_validation->run()==false)
		{

			$data['error']= validation_errors();
		}
		else
		{
			$this->M_user->simpan_user($this->input->post());
			$this->session->set_flashdata('msg','success');
			redirect ("admintc/user");
		}




		$data['judul']='Users';
		$data['data_user']=$this->M_user->tampil_user();
		$data['data_bagian']=$this->M_bagian->tampil_bagian();
		$this->template->set_template("admin/user/tampil_user",$data);
	}


	function ubah_status($id)
	{
		
		$ambil = $this->M_user->ambil_user($id);
		$status_user=$this->input->post('status_user');


		if ($ambil) {

			$data = array(
				'status_user' => $status_user
					);

			$nama=$ambil['nama_pegawai'];
			$this->M_user->update($id, $data);
			$this->session->set_flashdata('msg','info');
			redirect ("admintc/user");
		} 
	}




	function ubah($id)
	{
		$data_pengaturan =$this->M_pengaturan->ambil_pengaturan(1);
		$data	= 	array(
			'nama_aplikasi'		=> $data_pengaturan['nama_aplikasi'],
			'titel_aplikasi'	=> $data_pengaturan['titel_aplikasi'],
			'ket_aplikasi'		=> $data_pengaturan['ket_aplikasi'],
			'nama_perusahaan'	=> $data_pengaturan['nama_perusahaan'],
			'alamat_perusahaan'	=> $data_pengaturan['alamat_perusahaan'],
			'npwp_perusahaan'	=> $data_pengaturan['npwp_perusahaan'],
			'email_perusahaan'	=> $data_pengaturan['email_perusahaan'],
			'wa_perusahaan'		=> $data_pengaturan['wa_perusahaan'],
			'rek_perusahaan'	=> $data_pengaturan['rek_perusahaan'],
			'versi_app'			=> $data_pengaturan['versi_app'],
			'url_youtube'		=> $data_pengaturan['url_youtube'],
			'url_facebook'		=> $data_pengaturan['url_facebook'],
			'url_instagram'		=> $data_pengaturan['url_instagram'],
			'logo_app1'			=> $data_pengaturan['logo_app1'],
			'logo_app2'			=> $data_pengaturan['logo_app2'],
		);

		$data['judul']='Ubah Pengaturan';
		$data['ambil_pengaturan']=$this->M_pengaturan->ambil_pengaturan($id);
		$this->template->set_template("admin/tampil_pengaturan",$data);



		if ($this->input->post())
		{
			$this->M_user->ubah_user($this->input->post(),$id);
			$this->session->set_flashdata('msg','info');
			redirect ("admintc/user");
		}
	}

	function hapus($id)
	{

		$this->M_user->hapus_user($id);
		$this->session->set_flashdata('msg','success-hapus');
		redirect ("admintc/user");
	}



	


}