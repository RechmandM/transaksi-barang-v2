<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataBarang extends CI_Controller
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



	// public function index()
	// {
	// 	if ($this->session->userdata('ses_level') != 1) {
	// 		$data = [
	// 			"base" => base_url(),
	// 			"menu" => "barang",
	// 			"page" => "forbidden"
	// 		];
	// 		$this->load->view('layout/layout', $data);
	// 	} else {
	// 		$data = [
	// 			"base" => base_url(),
	// 			"menu" => "barang",
	// 			"page" => "page/master/barang/data"
	// 			// "databarang" => $this->ms->getAll('barang')->result()
	// 		];
	// 		// Mengambil semua data table
	// 		$data["databarang"] = $this->Master->getAll('barang')->result();
	// 		$this->load->view('layout/layout', $data);
	// 	}
	// }

	public function index()
	{
		redirect('Databarang/page');
	}

	public function page()
	{
		if ($this->session->userdata('ses_level') != 1) {
			$data = [
				"base" => base_url(),
				"menu" => "barang",
				"page" => "forbidden"
			];
			$this->load->view('layout/layout', $data);
		} else {
			$data = [
				"base" => base_url(),
				"menu" => "barang",
				"page" => "page/master/barang/data"
			];
			$table = 'barang';
			$controller = 'Databarang';
			$data['model'] =  $this->mp->view($table, $controller);
			// $data['model'] =  $this->mp->view();
			$this->load->view('layout/layout', $data);
		}
	}

	// end table view
	public function add()
	{
		if ($this->session->userdata('ses_level') != 1) {
			$data = [
				"base" => base_url(),
				"menu" => "barang",
				"page" => "forbidden"
			];
			$this->load->view('layout/layout', $data);
		} else {
			$data = [
				"base" => base_url(),
				"menu" => "barang",
				"page" => "page/master/barang/add"
				// "url_post" => "tambah_aksi"
			];
			$data['url_post'] = 'tambah_aksi';

			// KODE MENGGUNAKAN TANGAL DAN JAM
			$data['kode'] = $this->Master->kodetgl('BR');

			// KODE MENGGUNAKAN jumlah
			$data['kode'] = $this->Master->kodeb('BR', 'kdbarang', 'barang');

			// // KODE MENGGUNAKAN jumlah v2
			$data['kodebarang'] = $this->Master->kodebv2('BR', 'kdbarang', 'barang', 2, 4);

			// $nomor = $this->Master->autogenerate('barang', 'kdbarang', 'BR');
			// $data['kode'] = $nomor;
			$this->load->view('layout/layout', $data);
		}
	}

	public function tambah_aksi()
	{
		$config['upload_path'] = './assets/img/upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 1024;
		$config['max_width'] = 6000;
		$config['max_height'] = 6000;
		$config['file_name'] = str_replace(' ', '_', $_FILES['fileupload']['name']);

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$upload_data = $this->upload->data();
		$replacename = str_replace(' ', '_', $upload_data['file_name']);

		$file_name = $replacename;
		if (!$this->upload->do_upload('fileupload')) {
			$msg = $this->upload->display_errors();
			echo "<script type='text/javascript'>alert($msg)</script>";
			echo "<script type='text/javascript'>window.history.back();</script>";
		} else {
			// $kodebarang = $_POST['kodebarang']; SAMA SAJA
			$kodebarang = $this->input->post('kodebarang');
			$nm_barang = $this->input->post('nm_barang');
			$stock_mn = $this->input->post('stock_mn');
			// $data dibawah field / colom
			$data = [
				'kdbarang' => $kodebarang,
				'nmbarang' => $nm_barang,
				'stok_mn' => $stock_mn,
				'file_gambar' => $file_name,
			];
			$waktu = date('d-m-Y H:i:s');
			// $date = date('Y-m-d H:i:s');
			$date = date('d-m-Y H:i:s');
			$riwayat = [
				'data' => 'Barang',
				'nama' => $nm_barang,
				'kode' => $kodebarang,
				'status' => '2',
				'waktu' => $waktu,
				'time' => $date
			];
			$this->Master->input_data('barang', $data);
			$this->Master->riwayat_baru('riwayat', $riwayat);
			$this->Master->pesan('barang');
			// echo "<script type='text/javascript'>alert('pesan')</script>";
			// redirect('databarang');
		}
	}

	public function edit($id)
	{
		if ($this->session->userdata('ses_level') != 1) {
			$data = [
				"base" => base_url(),
				"menu" => "barang",
				"page" => "forbidden"
			];
			$this->load->view('layout/layout', $data);
		} else {
			$data = [
				"base" => base_url(),
				"menu" => "barang",
				"page" => "page/master/barang/edit"
			];

			$row = $this->Master->getby_id('barang', 'kdbarang', $id)->row();
			$data['kodebarang'] = $row->kdbarang;
			$data['nm_barang'] = $row->nmbarang;
			$data['stock_mn'] = $row->stok_mn;
			$data['file_gambar'] = $row->file_gambar;
			$data['url_post'] = '../edit_aksi';
			$this->load->view('layout/layout', $data);
		}
	}

	public function edit_aksi()
	{



		$config['upload_path'] = './assets/img/upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 1024;
		$config['max_width'] = 6000;
		$config['max_height'] = 6000;
		$config['file_name'] = str_replace(' ', '_', $_FILES['fileupload']['name']);

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$upload_data = $this->upload->data();
		$replacename = str_replace(' ', '_', $upload_data['file_name']);
		$file_name = $replacename;

		// $kodebarang = $_POST['kodebarang']; SAMA SAJA
		$file_gambar = $this->input->post('file_gambar');
		$kodebarang = $this->input->post('kodebarang');
		$nm_barang = $this->input->post('nm_barang');
		$stock_mn = $this->input->post('stock_mn');
		unlink('./assets/img/upload/' . $file_gambar);

		if (!$this->upload->do_upload('fileupload')) {
			$msg = $this->upload->display_errors();
			echo "<script type='text/javascript'>alert($msg)</script>";
			echo "<script type='text/javascript'>window.history.back();</script>";
		} else {

			// $data dibawah field / colom
			$data = [
				'nmbarang' => $nm_barang,
				'stok_mn' => $stock_mn,
				'file_gambar' => $file_name,
			];
			$waktu = date('d-m-Y H:i:s');
			// $date = date('Y-m-d H:i:s');
			$date = date('d-m-Y H:i:s');
			$riwayat = [
				'data' => 'Barang',
				'nama' => $nm_barang,
				'kode' => $kodebarang,
				'status' => '2',
				'waktu' => $waktu,
				'time' => $date
			];
			$this->Master->update_data('barang', $data, 'kdbarang', $kodebarang);
			$this->Master->riwayat_baru('riwayat', $riwayat);
			$this->Master->pesan('barang');
			echo "<script type='text/javascript'>alert('pesan')</script>";
			redirect('databarang');
		}

		// $kodebarang = $this->input->post('kodebarang');
		// $nm_barang = $this->input->post('nm_barang');
		// $stock_mn = $this->input->post('stock_mn');
		// $data = [
		// 	'nmbarang' => $nm_barang,
		// 	'stok_mn' => $stock_mn,
		// 	'kdbarang' => $kodebarang
		// ];
		// $waktu = date('d-m-Y H:i:s');
		// $date = date('Y-m-d H:i:s');
		// $riwayat = [
		// 	'data' => 'Barang',
		// 	'nama' => $nm_barang,
		// 	'kode' => $kodebarang,
		// 	'status' => '1',
		// 	'waktu' => $waktu,
		// 	'time' => $date
		// ];

		// $this->Master->update_data('barang', $data, 'kdbarang', $kodebarang);
		// $this->Master->riwayat_baru('riwayat', $riwayat);
		// $this->Master->pesan('barang');
		// // redirect('databarang/edit/' . $kodebarang); /// balik lagi kehalaman EDIT
	}

	public function delete($id, $name)
	{
		$waktu = date('d-m-Y H:i:s');
		$date = date('Y-m-d H:i:s');
		$nama = str_replace("%20", " ", $name);
		$riwayat = [
			'data' => 'Barang',
			'nama' => $nama,
			'kode' => $id,
			'status' => '0',
			'waktu' => $waktu,
			'time' => $date
		];
		$this->Master->riwayat_baru('riwayat', $riwayat);
		$this->Master->delete_data('barang', 'kdbarang', $id);
		redirect('databarang');
	}
}
