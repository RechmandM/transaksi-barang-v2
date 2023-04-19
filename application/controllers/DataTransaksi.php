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
		redirect('Datatransaksi/page');
	}

	public function page()
	{
		$data = [
			"base" => base_url(),
			"menu" => "transaksi",
			"page" => "page/master/transaksi/data"
			// "databarang" => $this->ms->getAll('barang')->result()
		];
		// Mengambil semua data table
		$table = 'transaksi_h';
		$controller = 'Datatransaksi';
		$data['model'] =  $this->mp->view($table, $controller);
		// $data["datatransaksi"] = $this->Master->getAll('transaksi_h', 'ORDER BY id_trans DESC')->result();
		$this->load->view('layout/layout', $data);
	}

	public function laporan()
	{
		$data = [
			"base" => base_url(),
			"menu" => "laporan_transaksi",
			"page" => "page/master/transaksi/laporan"
			// "databarang" => $this->ms->getAll('barang')->result()
		];
		$query = array(
			// "select" => " count(header_id) AS hasil, header_id",
			// "table" => " transaksi_d GROUP BY header_id",
			// "select" => " SUM(d.qty) AS qtytotal, SUM(d.total) AS sumtotal ",
			"select" => " h.* , count(d.header_id) AS hasil, sum(d.qty) AS total_qty, sum(d.total) AS total_harga, d.header_id",
			"table" => " transaksi_h h",
			"join" => " left join transaksi_d d on h.id_trans = d.header_id GROUP BY d.header_id order by d.header_id ASC",
			"where" => ""
		);
		// $jml = $this->Master->getAllJoin($query)->result();
		// Mengambil semua data table
		$table = 'transaksi_h';
		$controller = 'Datatransaksi';
		$data['model'] =  $this->mp->view($table, $controller);
		$data['jml'] =  $this->Master->getAllJoin($query)->result();
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
		$id_trans = $this->input->post('id_trans');
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
			'data' => 'Transaksi',
			'nama' => $jns_transaksi,
			'kode' => $kode_trans,
			'status' => '2',
			'waktu' => $waktu,
			'time' => $date
		];
		$this->Master->riwayat_baru('riwayat', $riwayat);
		$this->Master->input_data('transaksi_h', $data);
		// $this->Master->pesan('barang');
		// echo "<script type='text/javascript'>alert('pesan')</script>";
		// redirect('datatransaksi');
		// redirect('datatransaksi/edit/' . $data['id_trans']);
		redirect('datatransaksi/edit/' . $id_trans);
	}

	public function edit($id)
	{
		$data = [
			"base" => base_url(),
			"menu" => "transaksi",
			"page" => "page/master/transaksi/edit"
		];
		//////// pribadi /////////
		// $data['kode'] = $this->Master->kodebv2('TR', 'id_trans', 'transaksi_h', 2, 4);
		$data['datacustomer'] = $this->Master->tampil_data_custdansupp('customer')->result();
		$data['datasupplier'] = $this->Master->tampil_data_custdansupp('supplier')->result();
		//////// pribadi /////////

		$row = $this->Master->getby_id('transaksi_h', 'id_trans', $id)->row();
		$data['id_trans'] = $row->id_trans;
		$data['jns_transaksi'] = $row->jns_trans;
		$data['tgl_trans'] = $row->tgl_trans;
		$data['ref_id'] = $row->ref_id;
		// $data['supp_id'] = $row->supplier_id;
		// $data['cust_id'] = $row->customer_id;

		// =============== Query untuk menampilkan semua data dari table ==================
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
				$data['default']['customer'][$e]['selected'] = 'selected';
			}
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
			if ($row->supplier_id == $rowsupp['id']) {
				$data['default']['supplier'][$e]['selected'] = 'selected';
			}
			$e++;
		}
		/////////////////////////// query detail


		$query_barang = [
			// 'table' => ' barang a order by a.kdbarang ASC ', // order by kd barang
			'table' => ' barang a order by a.nmbarang ASC ', // order by nama barang
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
			'select' => ' d.*, b.nmbarang ',
			// 'join' => " LEFT JOIN barang b on b.kdbarang=d.kdbarang ", // key B = D
			'join' => " LEFT JOIN barang b on d.kdbarang=b.kdbarang ", // key D = B
			'where' => " header_id='$id' order by b.kdbarang ASC ",
		];
		$data['datadetail'] =  $this->Master->getAllJoin($query_detail)->result();

		// ================ JANGAN DIKETIK =====================
		$data['jangandiketik'] = "SELECT d.*,b.nmbarang 
		from transaksi_d d LEFT JOIN barang b 
		on b.kdbarang=d.kdbarang 
		where header_id='$id' order by kdbarang DESC";
		// ================ JANGAN DIKETIK =====================

		$data['url_post'] = '../edit_aksi';
		$data['url_post_detil'] = '../editdetail_aksi';
		$data['url_getdetail'] = '../grid_detail';
		$this->load->view('layout/layout', $data);
	}

	public function edit_aksi()
	{
		$id_trans = $this->input->post('id_trans');
		$jns_transaksi = $this->input->post('jns_transaksi');
		$tgl_trans = $this->input->post('tgl_trans');
		$ref_id = $this->input->post('ref_id');
		$supp_id = $this->input->post('supp_id');
		$cust_id = $this->input->post('cust_id');
		$data = [
			'id_trans' => $id_trans,
			'jns_trans' => $jns_transaksi,
			'tgl_trans' => $tgl_trans,
			'ref_id' => $ref_id,
			'supplier_id' => $supp_id,
			'customer_id' => $cust_id
		];
		$waktu = date('d-m-Y H:i:s');
		$date = date('Y-m-d H:i:s');
		$riwayat = [
			'data' => 'Transaksi',
			'nama' => $data['jns_trans'],
			'kode' => $data['id_trans'],
			'status' => '1',
			'waktu' => $waktu,
			'time' => $date
		];

		$this->Master->update_data('transaksi_h', $data, 'id_trans', $id_trans);
		$this->Master->riwayat_baru('riwayat', $riwayat);
		// redirect('datatransaksi/edit/' . $id_trans); /// balik lagi kehalaman EDIT
		redirect('datatransaksi/edit/' . $id_trans);
	}

	public function grid_detail()
	{
		$id = $this->input->post('idinput');
		$row = $this->Master->getby_id('transaksi_d', 'id', $id)->row();
		$jsonmsg = array(
			'hasil' => 'true',
			'qty' => $row->qty,
			'harga' => $row->harga,
			'detail_id' => $row->id,
			'kdbarang' => $row->kdbarang,
			'header_id' => $row->header_id
		);
		echo json_encode($jsonmsg);
	}

	public function editdetail_aksi()
	{
		$header_id = $this->input->post('header_id');
		$detail_id = $this->input->post('detail_id');
		$kdbarang = $this->input->post('kdbarang');
		$qty = $this->input->post('qty');
		$harga = $this->input->post('harga');

		$data = array(
			'header_id' => $header_id,
			'qty' => $qty,
			'harga' => $harga,
			'total' => $harga * $qty,
			'kdbarang' => $kdbarang
		);

		if ($detail_id) {
			$this->Master->update_data('transaksi_d', $data, 'id', $detail_id);
		} else {
			$this->Master->input_data('transaksi_d', $data);
		}
		// $this->Master->pesan('detail');
		redirect('datatransaksi/edit/' . $header_id);
	}
	public function delete($id, $name)
	{
		$waktu = date('d-m-Y H:i:s');
		$date = date('Y-m-d H:i:s');
		$riwayat = [
			'data' => 'Transaksi',
			'nama' => $name,
			'kode' => $id,
			'status' => '0',
			'waktu' => $waktu,
			'time' => $date
		];
		$this->Master->riwayat_baru('riwayat', $riwayat);
		$this->Master->delete_data('transaksi_h', 'id_trans', $id);
		$this->Master->delete_data('transaksi_d', 'header_id', $id);
		// $this->Master->delete_transaksi('transaksi_h', 'id_trans', $id, 'transaksi_d', 'header_id');
		redirect('datatransaksi');
	}

	public function delete_d($id_header, $id)
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
		$this->Master->delete_data('transaksi_d', 'id', $id);
		// $this->Master->delete_transaksi('transaksi_h', 'id_trans', $id, 'transaksi_d', 'header_id');
		redirect('datatransaksi/edit/' . $id_header);
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

		$html = $this->load->view('page/master/transaksi/print', $this->data, true);

		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);


		// $this->load->view('page/master/transaksi/print');
	}

	public function cetak()
	{
		$this->load->view('page/master/transaksi/cetak');
	}
}
