<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Master', 'ms');
		$this->is_logged();
	}

	function is_logged()
	{
		$this->load->library('session');
		if ($this->session->userdata('ses_statuslogin') != TRUE) {
			// $this->session->set_userdata('must_login','Anda Harus Login Dahulu');
			$this->session->set_tempdata('must_login', 'Anda Harus Login Dahulu', 1);
			redirect('login', 'refresh');
		}
	}


	public function index()
	{
		$data = [
			"base" => base_url(), // untuk include CSS/JS
			"menu" => "dash",
			"page" => "page/home",
			"barang" => $this->ms->jumlahData('barang'),
			"customer" => $this->ms->jumlahData('customer'),
			"supplier" => $this->ms->jumlahData('supplier'),
			"transaksi" => $this->ms->jumlahData('transaksi_h'),
			"users" => $this->ms->jumlahData('user'),
			"riwayat" => $this->ms->riwayat('riwayat', 'time')
		];
		$this->load->view('layout/layout', $data);
	}

	public function delete($table)
	{
		$this->ms->delete_data('riwayat', 'data', $table);
		$this->ms->pesan2($table);
	}
}
