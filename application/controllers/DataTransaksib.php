<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataTransaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Master -> ms ALIAS
		// $this->load->model('Master', 'ms');
		$this->load->model('Master');
	}

	public function index()
	{
		$data = [
			"base" => base_url(),
			"menu" => "transaksi",
			"page" => "page/master/transaksi/data"
			// "databarang" => $this->ms->getAll('barang')->result()
		];
		// Mengambil semua data table
		$data["datatransaksi"] = $this->Master->getAll('transaksi_h', 'ORDER BY id_trans DESC')->result();
		$this->load->view('layout/layout', $data);
	}

	// end table view
	public function add()
	{
		$data = [
			"base" => base_url(),
			"menu" => "transaksi",
			"page" => "page/master/transaksi/add"
			// "url_post" => "tambah_aksi"
		];
		$data['url_post']['url_post'] = 'tambah_aksi';

		//////// pribadi /////////
		// $data['kode'] = $this->Master->kodebv2('TR', 'id_trans', 'transaksi_h', 2, 4);
		$data['datacustomer'] = $this->Master->tampil_data_custdansupp('customer')->result();
		$data['datasupplier'] = $this->Master->tampil_data_custdansupp('supplier')->result();
		//////// pribadi /////////
		$sql_full = "SELECT a.* customer a order by a.id ASC "; //===================
		$data['kode'] = $this->Master->kodebv2('TR', 'id_trans', 'transaksi_h', 2, 4);
		$query_cust = [
			'table' => ' customer a order by a.id ASC ',
			'select' => ' a.* ',
			'join' => '',
			'where' => '',
		];
		$res_cust =  $this->Master->getAllJoin($query_cust)->result_array();
		$e = 0;
		foreach ($res_cust as $rowcust) {
			$data['default']['customer'][$e]['value'] = $rowcust['id'];
			$data['default']['customer'][$e]['display'] = $rowcust['nm_cust'];
			$e++;
		}
		// ============================================================
		$query_supp = [
			'table' => ' supplier a order by a.id ASC ',
			'select' => ' a.* ',
			'join' => '',
			'where' => '',
		];
		$res_supp =  $this->Master->getAllJoin($query_supp)->result_array();
		$e = 0;
		foreach ($res_supp as $rowsupp) {
			$data['default']['supplier'][$e]['value'] = $rowsupp['id'];
			$data['default']['supplier'][$e]['display'] = $rowsupp['nm_supp'];
			$e++;
		}
		$this->load->view('layout/layout', $data);
	}

	public function tambah_aksi()
	{
		// $kodebarang = $_POST['kodebarang']; SAMA SAJA
		// $kode_trans = $this->input->post('id_trans');
		// $jns_transaksi = $this->input->post('jns_transaksi');
		// $tgl_trans = $this->input->post('tgl_trans');
		// $ref_id = $this->input->post('ref_id');
		// // $data dibawah field / colom
		// $data = [
		// 	'id_trans' => $kode_trans,
		// 	'jns_trans' => $jns_transaksi,
		// 	'tgl_trans' => $tgl_trans,
		// 	'ref_id' => $ref_id
		// ];

		$kode_trans = $this->input->post('id_trans');
		$jns_transaksi = $this->input->post('jns_transaksi');
		$tgl_trans = $this->input->post('tgl_trans');
		$ref_id = $this->input->post('ref_id');
		$supp_id = $this->input->post('supp_id');
		$cust_id = $this->input->post('cust_id');
		$data = [
			'id_trans' => $kode_trans,
			'jns_trans' => $jns_transaksi,
			'tgl_trans' => $tgl_trans,
			'ref_id' => $ref_id,
			'supplier_id' => $supp_id,
			'customer_id' => $cust_id
		];

		$this->Master->input_data('transaksi_h', $data);
		// $this->Master->pesan('barang');
		// echo "<script type='text/javascript'>alert('pesan')</script>";
		redirect('datatransaksi');
	}

	public function edit($id)
	{
		$data = [
			"base" => base_url(),
			"menu" => "transaksi",
			"page" => "page/master/transaksi/edit",
			'url_post' => '../edit_aksi',
			'url_post' => '../edit_aksi',
			'url_post' => '../edit_aksi'
		];
		//////// pribadi /////////
		// $data['kode'] = $this->Master->kodebv2('TR', 'id_trans', 'transaksi_h', 2, 4);
		$data['datacustomer'] = $this->Master->tampil_data_custdansupp('customer')->result();
		$data['datasupplier'] = $this->Master->tampil_data_custdansupp('supplier')->result();
		//////// pribadi /////////

		$row = $this->Master->getby_id('transaksi_h', 'id_trans', $id)->row();
		$data['kode'] = $row->id_trans;
		$data['jns_transaksi'] = $row->jns_trans;
		$data['tgl_trans'] = $row->tgl_trans;
		$data['ref_id'] = $row->ref_id;
		// $data['supp_id'] = $row->supplier_id;
		// $data['cust_id'] = $row->customer_id;

		// =============== Query untuk menampilkan semua data dari table ==================
		$sql_full = "SELECT a.* customer a order by a.id ASC "; //===================
		// $data['kode'] = $this->Master->kodebv2('TR', 'id_trans', 'transaksi_h', 2, 4);

		$query_cust = [
				'table' => ' customer a order by a.id ASC ',
				'select' => ' a.* ',
				'join' => '',
				'where' => '',
			];
			$res_cust =  $this->Master->getAllJoin($query_cust)->result_array();
			$e = 0;
			foreach ($res_cust as $rowcust) {
				$data['default']['customer'][$e]['value'] = $rowcust['id'];
				$data['default']['customer'][$e]['display'] = $rowcust['nm_cust'];
				if ($row->customer_id == $rowcust['id']) {
					$data['default']['supplier'][$e]['selected'] = 'selected';
				}
				$e++;
			}

		$query_barang = [
			'table' => ' customer a order by a.id ASC ',
			'select' => ' a.* ',
			'join' => '',
			'where' => '',
		];

		$res_barang =  $this->Master->getAllJoin($query_barang)->result_array();
		$e = 0;
		foreach ($res_barang as $rowbarang) {
			$data['default']['kdbarang'][$e]['value'] = $rowbarang['kdbarang'];
			$data['default']['kdbarang'][$e]['display'] = $rowbarang['nmbarang'];
			// if ($row->customer_id == $rowcust['id']) {
			// 	$data['default']['customer'][$e]['selected'] = 'selected';
			// }
			$e++;
		}
		$query_detail = [
			'table' => ' transaksi_d d ',
			'select' => ' d.*,b.nmbarang ',
			'join' => " header_id='$id' order by b.kdbarang ASC",
			'where' => '',
		];
		$data['datadetail'] =  $this->Master->getAllJoin($query_detail)->result();
		// ============================================================
		// $query_supp = [
		// 	'table' => ' supplier a order by a.id ASC ',
		// 	'select' => ' a.* ',
		// 	'join' => '',
		// 	'where' => '',
		// ];
		// $res_supp =  $this->Master->getAllJoin($query_supp)->result_array();
		// $e = 0;
		// foreach ($res_supp as $rowsupp) {
		// 	$data['default']['supplier'][$e]['value'] = $rowsupp['id'];
		// 	$data['default']['supplier'][$e]['display'] = $rowsupp['nm_supp'];
		// 	if ($row->supplier_id == $rowsupp['id']) {
		// 		$data['default']['supplier'][$e]['selected'] = 'selected';
		// 	}
		// 	$e++;
		// }

		$this->load->view('layout/layout', $data);
	}

	public function edit_aksi()
	{
		$kode_trans = $this->input->post('id_trans');
		$jns_transaksi = $this->input->post('jns_transaksi');
		$tgl_trans = $this->input->post('tgl_trans');
		$ref_id = $this->input->post('ref_id');
		$supp_id = $this->input->post('supp_id');
		$cust_id = $this->input->post('cust_id');
		$data = [
			'id_trans' => $kode_trans,
			'jns_trans' => $jns_transaksi,
			'tgl_trans' => $tgl_trans,
			'ref_id' => $ref_id,
			'supplier_id' => $supp_id,
			'customer_id' => $cust_id
		];
		$waktu = date('d-m-Y H:i:s');
		$date = date('Y-m-d H:i:s');
		$riwayat = [
			'data' => 'Barang',
			'status' => '1',
			'waktu' => $waktu,
			'time' => $date
		];

		$this->Master->update_data('transaksi_h', $data, 'id_trans', $kode_trans);
		$this->Master->riwayat_baru('riwayat', $riwayat);
		// $this->Master->pesan('barang');
		// redirect('databarang/edit/' . $kodebarang); /// balik lagi kehalaman EDIT
	}

	public function delete($id)
	{
		$waktu = date('d-m-Y H:i:s');
		$date = date('Y-m-d H:i:s');
		// $nama = str_replace("%20", " ", $name);
		$riwayat = [
			'data' => 'Barang',
			// 'nama' => $nama,
			'kode' => $id,
			'status' => '0',
			'waktu' => $waktu,
			'time' => $date
		];
		// $this->Master->riwayat_baru('riwayat', $riwayat);
		$this->Master->delete_data('transaksi_h', 'id_trans', $id);
		// $this->Master->delete_transaksi('transaksi_h', 'id_trans', $id, 'transaksi_d', 'header_id');
		redirect('datatransaksi');
	}

	public function delete_d($header, $id)
	{
		$waktu = date('d-m-Y H:i:s');
		$date = date('Y-m-d H:i:s');
		// $nama = str_replace("%20", " ", $name);
		$riwayat = [
			'data' => 'Barang',
			// 'nama' => $nama,
			'kode' => $id,
			'status' => '0',
			'waktu' => $waktu,
			'time' => $date
		];
		// $this->Master->riwayat_baru('riwayat', $riwayat);
		$this->Master->delete_data('transaksi_h', 'id_trans', $id);
		// $this->Master->delete_transaksi('transaksi_h', 'id_trans', $id, 'transaksi_d', 'header_id');
		redirect('datatransaksi');
	}
}
