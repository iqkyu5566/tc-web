<?php 
class pengeluaran extends CI_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("template");
		$this->load->library("form_validation");
		$this->load->model("M_pengaturan");
		
		if ($this->session->userdata('status_user')==false)
		{
			redirect("login");
		}

	}
	function index()
	{
		$data_pengaturan =$this->M_pengaturan->ambil_pengaturan(1);
		$data	= 	array(
			'nama_aplikasi'		=> $data_pengaturan['nama_aplikasi'],
			'titel_aplikasi'	=> $data_pengaturan['titel_aplikasi'],
			'ket_aplikasi'		=> $data_pengaturan['ket_aplikasi'],
			
			'ketua_dprd'		=> $data_pengaturan['ketua_dprd'],
			'no_wa'				=> $data_pengaturan['no_wa'],
			'logo_app1'			=> $data_pengaturan['logo_app1'],
			'logo_app2'			=> $data_pengaturan['logo_app2'],
			'versi_app'			=> $data_pengaturan['versi_app'],
			'copy_app'			=> $data_pengaturan['copy_app'],
			'run_text'			=> $data_pengaturan['run_text'],
			'code_youtube'		=> $data_pengaturan['code_youtube'],

		);


		$this->form_validation->set_rules("judul_pengeluaran","Judul  Pengeluaran","trim|required");

		//membuat pesan dari setiap kolom 
		$this->form_validation->set_message("required","{field}, tidak boleh kosong");

		if ($this->form_validation->run()==false)
		{
			$data['error']= validation_errors();
		}
		else
		{
			$this->M_pengeluaran->simpan_pengeluaran($this->input->post());
			$this->session->set_flashdata('msg','success');
			redirect ("adminprima/pengeluaran");
		}
		$data['judul']='Data Buku';
		$data['data_pengeluaran']=$this->M_pengeluaran->tampil_pengeluaran();
		$data['data_member']=$this->M_member->tampil_member();
		$data['data_layanan']=$this->M_layanan->tampil_layanan();
		$data['data_tenaga']=$this->M_tenaga->tampil_tenaga();
		$this->template->set_template("admin/tampil_pengeluaran",$data);
	}


	function tarik_pengeluaran_bulanan()
	{

		$tgl_awal=$this->input->get("tgl_awal");
		$tgl_akhir=$this->input->get("tgl_akhir");

		$data_pengaturan =$this->M_pengaturan->ambil_pengaturan(1);
		$data	= 	array(
			'nama_aplikasi'		=> $data_pengaturan['nama_aplikasi'],
			'titel_aplikasi'	=> $data_pengaturan['titel_aplikasi'],
			'ket_aplikasi'		=> $data_pengaturan['ket_aplikasi'],
			'ketua_dprd'		=> $data_pengaturan['ketua_dprd'],
			'no_wa'				=> $data_pengaturan['no_wa'],
			'logo_app1'			=> $data_pengaturan['logo_app1'],
			'logo_app2'			=> $data_pengaturan['logo_app2'],
			'versi_app'			=> $data_pengaturan['versi_app'],
			'copy_app'			=> $data_pengaturan['copy_app'],
			'run_text'			=> $data_pengaturan['run_text'],
			'code_youtube'		=> $data_pengaturan['code_youtube'],

		);
		
		$data['judul']='Data pengeluaran';
		$data['data_pengeluaran']=$this->M_pengeluaran->tampil_pengeluaran();
		$data['data_member']=$this->M_member->tampil_member();
		$data['data_layanan']=$this->M_layanan->tampil_layanan();
		$data['data_tenaga']=$this->M_tenaga->tampil_tenaga();
		$data['hasil_pengeluaran_bulanan']=$this->M_pengeluaran->ambil_pengeluaran_bulanan($tgl_awal,$tgl_akhir);

		$this->load->view("admin/cetak_pengeluaran_bulanan",$data);
	}



	function ubah($id)
	{

		if ($this->input->post())
		{
			$this->M_pengeluaran->ubah_pengeluaran($this->input->post(),$id);
			$this->session->set_flashdata('msg','info');
			redirect ("adminprima/pengeluaran");
		}
	}
	

	function hapus($id)
	{

		$this->M_pengeluaran->hapus_pengeluaran($id);
		$this->session->set_flashdata('msg','success-hapus');
		redirect ("adminprima/pengeluaran");
	}


}