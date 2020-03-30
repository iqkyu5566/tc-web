<?php 
class Home extends CI_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("template");
	}
	function index()
	{
		$this->template->set_template("admin/index");
	}


}