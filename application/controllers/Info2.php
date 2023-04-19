<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info2 extends CI_Controller
{


	public function index()
	{
		// $data = [
		// 	"base" => base_url(),
		// 	"nama" => "My Name",
		// 	"notlp" => "My Number",
		// 	"alamat" => "My Adress",
		// 	"page" => "page/info/info"
		// ];
		$this->load->view('info2');
	}
}
