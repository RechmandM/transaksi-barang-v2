<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataCustomer extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
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
		redirect('Datacustomer/page');
	}

	public function page()
	{
		if ($this->session->userdata('ses_level') != 1) {
			$data = [
				"base" => base_url(),
				"menu" => "customer",
				"page" => "forbidden"
			];
			$this->load->view('layout/layout', $data);
		} else {

			$data = [
				"base" => base_url(),
				"menu" => "customer",
				"page" => "page/master/customer/data"
				// "datacustomer" => $this->ms->getAll('customer')->result()
			];
			$table = 'customer';
			$controller = 'Datacustomer';
			$data['model'] =  $this->mp->view($table, $controller);
			$this->load->view('layout/layout', $data);
		}
	}

	public function add()
	{
		if ($this->session->userdata('ses_level') != 1) {
			$data = [
				"base" => base_url(),
				"menu" => "customer",
				"page" => "forbidden"
			];
			$this->load->view('layout/layout', $data);
		} else {
			$data = [
				"base" => base_url(),
				"menu" => "customer",
				"page" => "page/master/customer/add",
				"url_post" => "tambah_aksi"
			];

			// KODE MENGGUNAKAN TANGAL DAN JAM
			$data['kode'] = $this->Master->kodetgl('CST');

			// // KODE MENGGUNAKAN jumlah v2
			$data['kode'] = $this->Master->kodebv2('CST', 'id', 'customer', 3, 4);
			$this->load->view('layout/layout', $data);
		}
	}

	public function tambah_aksi()
	{
		$id_cust = $this->input->post('kodecust');
		$nm_cust = $this->input->post('nm_cust');
		$telp_cust = $this->input->post('telp');
		$alamat_cust = $this->input->post('alamat');
		$data = [
			'id' => $id_cust,
			'nm_cust' => $nm_cust,
			'telp' => $telp_cust,
			'alamat' => $alamat_cust
		];
		$waktu = date('d-m-Y H:i:s');
		$date = date('Y-m-d H:i:s');
		$riwayat = [
			'data' => 'Customer',
			'nama' => $nm_cust,
			'kode' => $id_cust,
			'status' => '2',
			'waktu' => $waktu,
			'time' => $date
		];
		$this->Master->input_data('customer', $data);
		$this->Master->riwayat_baru('riwayat', $riwayat);
		$this->Master->pesan('customer');
	}

	public function edit($id)
	{
		if ($this->session->userdata('ses_level') != 1) {
			$data = [
				"base" => base_url(),
				"menu" => "customer",
				"page" => "forbidden"
			];
			$this->load->view('layout/layout', $data);
		} else {
			$data = [
				'base' => base_url(),
				'menu' => 'customer',
				'page' => 'page/master/customer/edit',
				'url_post' => '../edit_aksi'
			];
			$row = $this->Master->getby_id('customer', 'id', $id)->row();
			$data['id'] = $row->id;
			$data['name'] = $row->nm_cust;
			$data['telp'] = $row->telp;
			$data['alamat'] = $row->alamat;
			$this->load->view('layout/layout', $data);
		}
	}
	public function edit_aksi()
	{
		$id_cust = $this->input->post('kodecust');
		$nm_cust = $this->input->post('nm_cust');
		$telp_cust = $this->input->post('telp');
		$alamat_cust = $this->input->post('alamat');

		$data = [
			'nm_cust' => $nm_cust,
			'telp' => $telp_cust,
			'alamat' => $alamat_cust
		];
		$waktu = date('d-m-Y H:i:s');
		$date = date('Y-m-d H:i:s');
		$riwayat = [
			'data' => 'Customer',
			'nama' => $nm_cust,
			'kode' => $id_cust,
			'status' => '1',
			'waktu' => $waktu,
			'time' => $date
		];
		$this->Master->update_data('customer', $data, 'id', $id_cust,);
		$this->Master->riwayat_baru('riwayat', $riwayat);
		$this->Master->pesan('customer');
	}

	public function delete($id, $name)
	{
		$waktu = date('d-m-Y H:i:s');
		$date = date('Y-m-d H:i:s');
		$nama = str_replace("%20", " ", $name);
		$riwayat = [
			'data' => 'Customer',
			'nama' => $nama,
			'kode' => $id,
			'status' => '0',
			'waktu' => $waktu,
			'time' => $date
		];
		$this->Master->riwayat_baru('riwayat', $riwayat);
		$this->Master->delete_data('customer', 'id', $id);
		redirect('datacustomer');
	}
}
