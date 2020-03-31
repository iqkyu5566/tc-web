<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


	public function index()
	{
		$data['judul'] = 'admin';
		// $this->load->view('Tadmin/index');

		$this->load->view('Tadmin/01header', $data);
		$this->load->view('Tadmin/02content');
	}
}
