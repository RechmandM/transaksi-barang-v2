<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataUser extends CI_Controller
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
		redirect('Datauser/page');
	}

	public function page()
	{
		if ($this->session->userdata('ses_level') != 1) {
			$data = [
				"base" => base_url(),
				"menu" => "user",
				"page" => "forbidden"
			];
			$this->load->view('layout/layout', $data);
		} else {
			$data = [
				"base" => base_url(),
				"menu" => "user",
				"page" => "page/master/user/data"
				// "databarang" => $this->ms->getAll('barang')->result()
			];
			// Mengambil semua data table
			$table = 'user';
			$controller = 'Datauser';
			$data['model'] =  $this->mp->view($table, $controller);
			$this->load->view('layout/layout', $data);
		}
	}

	// end table view
	public function add()
	{
		if ($this->session->userdata('ses_level') != 1) {
			$data = [
				"base" => base_url(),
				"menu" => "user",
				"page" => "forbidden"
			];
			$this->load->view('layout/layout', $data);
		} else {
			$data = [
				"base" => base_url(),
				"menu" => "user",
				"page" => "page/master/user/add"
				// "url_post" => "tambah_aksi"
			];
			$data['url_post'] = 'tambah_aksi';

			// KODE MENGGUNAKAN TANGAL DAN JAM
			// $data['kode'] = $this->Master->kodetgl('BR');

			// KODE MENGGUNAKAN jumlah
			// $data['kode'] = $this->Master->kodeb('BR', 'kdbarang', 'barang');

			// // KODE MENGGUNAKAN jumlah v2
			// $data['kodebarang'] = $this->Master->kodebv2('BR', 'kdbarang', 'barang', 2, 4);

			// $nomor = $this->Master->autogenerate('barang', 'kdbarang', 'BR');
			// $data['kode'] = $nomor;
			$this->load->view('layout/layout', $data);
		}
	}

	public function tambah_aksi()
	{
		// $kodebarang = $_POST['kodebarang']; SAMA SAJA
		$username = $this->input->post('username');
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		// $data dibawah field / colom

		$passmd5 = md5($username . $password);

		$rowcek = $this->Master->getby_id('user', 'username', $username)->num_rows();

		if ($rowcek > 0) {
			echo "<script type='text/javascript'>alert('Username ini sudah digunakan oleh user lain')</script>";
			echo "<script type='text/javascript'>history.back()</script>";
		} else {
			$data = [
				'username' => $username,
				'nama' => $nama,
				'password' => $passmd5,
				'level' => $level,
				'status' => 1,
			];

			$this->Master->input_data('user', $data);
			echo "<script type='text/javascript'>alert('Sukses')</script>";
			echo "<script type='text/javascript'>window.location = '../datauser'</script>";
			// redirect('datauser/add');
		}
	}

	public function edit($id)
	{
		if ($this->session->userdata('ses_level') != 1) {
			$data = [
				"base" => base_url(),
				"menu" => "user",
				"page" => "forbidden"
			];
			$this->load->view('layout/layout', $data);
		} else {
			$data = [
				"base" => base_url(),
				"menu" => "user",
				"page" => "page/master/user/edit"
			];

			$row = $this->Master->getby_id('user', 'id', $id)->row();
			$data['username'] = $row->username;
			$data['nama'] = $row->nama;
			$data['level'] = $row->level;

			if ($row->level == 1) {
				$levelname = 'Administrator';
			} else {
				$levelname = 'Kasir';
			}
			$data['levelname'] = $levelname;
			$data['url_post'] = '../edit_aksi';
			$this->load->view('layout/layout', $data);
		}
	}

	public function edit_aksi()
	{
		$username = $this->input->post('username');
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		$rowset = $this->Master->getby_id('user', 'username', $username)->row();

		if ($password) {
			$passmd5 = md5($username . $password);
		} else {
			$passmd5 = $rowset->password;
		}
		$data = [
			'username' => $username,
			'nama' => $nama,
			'password' => $passmd5,
			'level' => $level,
			'status' => 1,
		];

		$this->Master->update_data('user', $data, 'username', $username);
		redirect('datauser/edit/' . $rowset->id); /// balik lagi kehalaman EDIT
	}

	public function delete($id)
	{
		$this->Master->delete_data('user', 'id', $id);
		redirect('datauser');
	}
}
