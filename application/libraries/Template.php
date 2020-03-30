<?php 
 	class Template
 	{
 		public $terpusat;
 		function __construct()
 		{
 			//get construct isi semua class yang dimilik oleh codeigniter
 			$this->terpusat = &get_instance();
 		}
 		function set_template($namafile,$data=false)
 		{
 			$hasil['konten']=$this->terpusat->load->view($namafile,$data,true);
 			$this->terpusat->load->view("admin/index",$hasil);
 		}

 		function set_web($namafile,$data=false)
 		{
 			$hasil['konten']=$this->terpusat->load->view($namafile,$data,true);
 			$this->terpusat->load->view("index",$hasil);
 		}

 		
 	}