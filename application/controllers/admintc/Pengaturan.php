<?php 
class Pengaturan extends CI_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("template");
		$this->load->library("form_validation");
		$this->load->model("M_pengaturan");


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

		$data['judul']='Pengaturan';
		$data['data_pengaturan']=$this->M_pengaturan->tampil_pengaturan();
		$this->template->set_template("admin/pengaturan/tampil_pengaturan",$data);
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
		$this->template->set_template("admin/pengaturan/tampil_pengaturan",$data);

		$logo=$this->upload_logo();
		$logo_app2=$this->upload_icon();

		if ($this->input->post())
		{
			$this->M_pengaturan->ubah_pengaturan($this->input->post(),$id,$logo,$logo_app2);
			$this->session->set_flashdata("pesan",pesan("Pesan Sukses","Data Pengaturan Aplikasi berhasil diubah!!!"));
			redirect ("admintc/pengaturan");
		}
	}

	function upload_logo()
	{
			$config['upload_path']          = './gambar/pengaturan';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['encrypt_name'] 		= TRUE;
			$this->upload->initialize($config);

			$this->upload->do_upload('logo_app1');
			return $this->upload->data();
	}


	function upload_icon()
	{
			$config['upload_path']          = './gambar/pengaturan';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['encrypt_name'] 		= TRUE;
			$this->upload->initialize($config);

			$this->upload->do_upload('logo_app2');
			return $this->upload->data();
	}

	


}