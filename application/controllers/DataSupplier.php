<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataSupplier extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Master');
		$this->load->model('M_page', 'mp');
		$this->is_logged();
		// $this->is_forbidden();
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

	function is_forbidden()
	{
		$data = [
			"base" => base_url(),
			"menu" => "supplier",
			"page" => "forbidden"
		];
		$this->load->view('layout/layout', $data);
		return true;
	}

	public function index()
	{
		redirect('Datasupplier/page');
	}

	public function page()
	{
		if ($this->session->userdata('ses_level') != 1) {
			// $this->is_forbidden();
			redirect('datasupplier/is_forbidden');
		} else {
			$data = [
				"base" => base_url(),
				"menu" => "supplier",
				"page" => "page/master/supplier/data"
				// "datasupplier" => $this->ms->getAll('supplier')->result()
			];
			// $data["datasupplier"] = $this->Master->getAll('supplier')->result();
			$table = 'supplier';
			$controller = 'Datasupplier';
			$data['model'] =  $this->mp->view($table, $controller);
			$this->load->view('layout/layout', $data);
		}
	}

	public function add()
	{
		if ($this->session->userdata('ses_level') != 1) {
			// $this->is_forbidden();
			redirect('datasupplier/is_forbidden');
		} else {
			$data = [
				"base" => base_url(),
				"menu" => "supplier",
				"page" => "page/master/supplier/add",
				"url_post" => "tambah_aksi"
			];

			// // KODE MENGGUNAKAN TANGAL DAN JAM
			$data['kode'] = $this->Master->kodetgl('SPP');

			// KODE MENGGUNAKAN jumlah v2
			$data['kode'] = $this->Master->kodebv2('SPP', 'id', 'supplier', 3, 4);
			$this->load->view('layout/layout', $data);
		}
	}

	public function tambah_aksi()
	{
		$data = [
			'id' => $this->input->post('kodesupp'),
			'nm_supp' => $this->input->post('nm_supp'),
			'telp' => $this->input->post('telp'),
			'alamat' => $this->input->post('alamat')
		];
		$waktu = date('d-m-Y H:i:s');
		$date = date('Y-m-d H:i:s');
		$riwayat = [
			'data' => 'Supplier',
			'nama' => $data['nm_supp'],
			'kode' => $data['id'],
			'status' => '2',
			'waktu' => $waktu,
			'time' => $date
		];
		$this->Master->input_data('supplier', $data);
		$this->Master->riwayat_baru('riwayat', $riwayat);
		$this->Master->pesan('supplier');
	}

	public function edit($id)
	{
		if ($this->session->userdata('ses_level') != 1) {
			// $this->is_forbidden();
			redirect('datasupplier/is_forbidden');
		} else {
			$data = [
				'base' => base_url(),
				'menu' => 'supplier',
				'page' => 'page/master/supplier/edit',
				'url_post' => '../edit_aksi'
			];
			$row = $this->Master->edit_data('supplier', 'id', $id);
			foreach ($row as $has) {
				$data['id_supp'] = $has->id;
				$data['nm_supp'] = $has->nm_supp;
				$data['telp'] = $has->telp;
				$data['alamat'] = $has->alamat;
			}
			$this->load->view('layout/layout', $data);
		}
	}

	public function edit_aksi()
	{
		$id_supp = $this->input->post('kodesupp');

		$data = [
			'nm_supp' => $this->input->post('nm_supp'),
			'telp' => $this->input->post('telp'),
			'alamat' => $this->input->post('alamat'),
		];
		$waktu = date('d-m-Y H:i:s');
		$date = date('Y-m-d H:i:s');
		$riwayat = [
			'data' => 'Supplier',
			'nama' => $data['nm_supp'],
			'kode' => $id_supp,
			'status' => '1',
			'waktu' => $waktu,
			'time' => $date
		];
		$this->Master->update_data('supplier', $data, 'id', $id_supp);
		$this->Master->riwayat_baru('riwayat', $riwayat);
		$this->Master->pesan('supplier');
	}

	public function delete($id, $name)
	{
		$waktu = date('d-m-Y H:i:s');
		$date = date('Y-m-d H:i:s');
		$nama = str_replace("%20", " ", $name);
		$riwayat = [
			'data' => 'Supplier',
			'nama' => $nama,
			'kode' => $id,
			'status' => '0',
			'waktu' => $waktu,
			'time' => $date
		];
		$this->Master->riwayat_baru('riwayat', $riwayat);
		$this->Master->delete_data('supplier', 'id', $id);
		redirect('datasupplier');
	}
}
