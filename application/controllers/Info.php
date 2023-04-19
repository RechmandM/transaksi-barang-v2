<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{

	public function index()
	{
		$this->load->library('session');
		if ($this->session->userdata('ses_statuslogin') != TRUE) {
			// $this->session->set_userdata('must_login','Anda Harus Login Dahulu');
			$this->session->set_tempdata('must_login', 'Anda Harus Login Dahulu', 1);
			redirect('login', 'refresh');
		}

		$data = [
			"base" => base_url(),
			"menu" => "info",
			// "nama" => "Rechmand M",
			"nama" => $this->session->userdata('ses_nama'),
			"notlp" => "0821 1363 7521",
			"alamat" => "Jl gatot subroto km 4, Jatiuwung Tangerang City",
			"page" => "page/info/info"
		];
		$this->load->view('layout/layout', $data);
		// $this->is_logged();
	}

	function is_logged()
	{
		$this->load->library('session');
		if ($this->session->userdata('ses_statuslogin') != TRUE) {
			redirect('login', 'refresh');
		}
	}

	/////////////////////////////////// BIODATA /////////////////////////////////////
	public function biodata()
	{
		$data = [
			"base" => base_url(),
			"menu" => "info",
			"nama" => "Mohammad Nurrahman",
			"notlp" => "0897 7367 8732",
			"alamat" => "Jl Gatot Subroto km 09, Kp Cikoneng Ilir, Ds Gandasari, Kec. Jatiuwung Kota Tangerang",
			"page" => "page/info/biodata"
		];
		$this->load->view('layout/layout', $data);
	}

	/////////////////////////////////// KALKULATOR /////////////////////////////////////
	public function kalkulator($angka, $angka2)
	{
		$data = [
			"base" => base_url(),
			"menu" => "info",
			"angka" => $angka,
			"angka2" => $angka2,
			"page" => "page/info/kalkulator"
		];
		$this->load->view('layout/layout', $data);
	}

	/////////////////////////////////// CV /////////////////////////////////////
	public function cv()
	{
		$data = [
			"base" => base_url(),
			"menu" => "info",
			"page" => "page/info/cv"
		];
		$this->load->view('layout/layout', $data);
	}
}
