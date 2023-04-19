<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
		redirect('Laporan/page');
	}

	public function page()
	{
		$data = [
			"base" => base_url(),
			"menu" => "laporan",
			"page" => "page/master/transaksi/laporan",
			"url_post" => "laporan/page"
		];
		if ($this->input->post('cari') != null) {
			$cari = $this->input->post('cari');
		} else {
			$cari = '';
		}
		$data['cari'] = $cari;
		$query = array(
			"select" => " h.* , count(d.header_id) AS hasil, sum(d.qty) AS total_qty, sum(d.total) AS total_harga, d.header_id",
			"table" => " transaksi_h h",
			"join" => " left join transaksi_d d on h.id_trans = d.header_id GROUP BY d.header_id order by d.header_id ASC",
			"where" => " ((h.tgl_trans IS NULL) ON (h.tgl_trans LIKE '%$cari')) GROUP BY h.id_trans order by h.id_trans"
		);


		$table = 'transaksi_h';
		$controller = 'Laporan';
		$data['model'] =  $this->mp->view($table, $controller);
		$data['jml'] =  $this->Master->getAllJoin($query)->result();
		$this->load->view('layout/layout', $data);
	}

	public function print($id)
	{
		$this->load->library('pdfgenerator');
		$this->data['title'] = 'Form Transaksi';
		$file_pdf = 'form_bayar_';
		$paper = 'A4';
		$orientation = 'potrait';
		$this->data['base'] = base_url();
		$query = array(
			"select" => " d.*, b.nmbarang, format(d.harga,0) hargaunit, format(d.total,0) totalharga ",
			"table" => " transaksi_d d ",
			"join" => " LEFT JOIN barang b ON b.kdbarang=d.kdbarang ",
			"where" => " header_id='$id' order by b.kdbarang ASC"
		);
		$rowdetail = $this->Master->getAllJoin($query)->result();

		$querytotal = array(
			// "select" => " SUM(d.qty) AS qtytotal, SUM(d.total) AS sumtotal ",
			"select" => " SUM(d.qty) qtytotal, SUM(d.total) sumtotal ",
			"table" => " transaksi_d d ",
			"join" => " LEFT JOIN barang b ON b.kdbarang=d.kdbarang ",
			"where" => " header_id='$id' order by b.kdbarang ASC"
		);
		$rowtotal = $this->Master->getAllJoin($querytotal)->row();

		$queryheader = array(
			"select" => " h.*, c.nm_cust, s.nm_supp, c.telp as c_telp, s.telp as s_telp , c.alamat as c_alamat, s.alamat as s_alamat",
			"table" => " transaksi_h h ",
			"join" => " LEFT JOIN customer c ON h.customer_id=c.id LEFT JOIN supplier s ON h.supplier_id=s.id ",
			"where" => " id_trans='$id'"
		);
		$rowheader = $this->Master->getAllJoin($queryheader)->row();

		$this->data['id'] = $id;
		$this->data['header'] = $rowheader;
		$this->data['total'] = $rowtotal;
		$this->data['bayar'] = $rowdetail;

		$html = $this->load->view('page/master/transaksi/print2', $this->data, true);

		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);


		// $this->load->view('page/master/transaksi/print');
	}
}
