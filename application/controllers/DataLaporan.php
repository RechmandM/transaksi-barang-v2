<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataLaporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Master -> ms ALIAS
		// $this->load->model('Master', 'ms');
		$this->load->model('Master');
		$this->load->model('M_page', 'mp');
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
		redirect('Datalaporan/page');
	}

	public function page(){
		$data = [
			"base" => base_url(),
			"menu" => "laporan",
			"page" => "page/master/transaksi/laporan",
			"url_post" => "Datalaporan/page"
		];
		if ($this->input->post('cari') != null) {
			$cari = $this->input->post('cari');
			$data['cari'] = $cari;
		$query = array(
			"select" => " h.* , count(d.header_id) AS hasil, sum(d.qty) AS total_qty, sum(d.total) AS total_harga, d.header_id",
			"table" => " transaksi_h h",
			"join" => " inner join transaksi_d d on h.id_trans = d.header_id ",
			// "join" => " inner join transaksi_d d on h.id_trans = d.header_id GROUP BY d.header_id order by d.header_id ASC",
			// "where" => ""
			// "where" => " LIKE '%$cari' GROUP BY d.header_id order by d.header_id ASC"
			"where" => " ((h.tgl_trans IS NULL) OR (h.tgl_trans LIKE '%$cari')) GROUP BY d.header_id order by d.header_id ASC LIMIT 1"
			// "where" => " ((h.tgl_trans IS NULL) ON (h.tgl_trans LIKE '%$cari')) GROUP BY h.id_trans order by h.id_trans"
		);


		$table = 'transaksi_h';
		$controller = 'Laporan';
		$data['model'] =  $this->mp->view($table, $controller);
		$data['jml'] =  $this->Master->getAllJoin($query)->result();
		$this->load->view('layout/layout', $data);
			
		} else {
			$cari = '';
			$data['cari'] = $cari;
		$query = array(
			"select" => " h.* , count(d.header_id) AS hasil, sum(d.qty) AS total_qty, sum(d.total) AS total_harga, d.header_id",
			"table" => " transaksi_h h",
			"join" => " inner join transaksi_d d on h.id_trans = d.header_id ",
			// "join" => " inner join transaksi_d d on h.id_trans = d.header_id GROUP BY d.header_id order by d.header_id ASC",
			// "where" => ""
			// "where" => " LIKE '%$cari' GROUP BY d.header_id order by d.header_id ASC"
			"where" => " ((h.tgl_trans IS NULL) OR (h.tgl_trans LIKE '%$cari')) GROUP BY d.header_id order by d.header_id ASC"
			// "where" => " ((h.tgl_trans IS NULL) ON (h.tgl_trans LIKE '%$cari')) GROUP BY h.id_trans order by h.id_trans"
		);


		$table = 'transaksi_h';
		$controller = 'Laporan';
		$data['model'] =  $this->mp->view($table, $controller);
		$data['jml'] =  $this->Master->getAllJoin($query)->result();
		$this->load->view('layout/layout', $data);
		}
		
	}

}
