<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('Master');

		// ini alias = login
		// $this->load->model('Login_model', 'login');
		$this->load->model('Login_model');
		$this->load->library('session');
		$this->load->library('form_validation');
	}


	public function index()
	{

		// BEST PRATICE pakai controller
		// $cekmust = $this->session->userdata('must_login');
		$cekmust = $this->session->tempdata('must_login');
		// if (isset($cekmust)) {
		// 	$data['cekmust'] = $cekmust;
		// 	$data['hidden'] = 'n';
		// 	// $this->session->sess_destroy();
		// 	$this->session->sess_destroy();
		// }


		if ($this->session->userdata('ses_statuslogin') == true) {
			redirect();
		}

		$checkdata = $this->Login_model->getcountlogin('u', 'u');
		$data = [
			"base" => base_url(), // untuk include CSS/JS
			"site" => base_url(), // untuk include CSS/JS
			"menu" => "login",
			"title" => "Login",
			'url_post' => site_url('login/validationlogin'),
			'ayam' => $checkdata /// pngetesan aja


			// "title" => "Login",
			// "base" => base_url(),
			// "site" => base_url(),
			// "url_post" => site_url('login/validationlogin')
		];
		if (isset($cekmust)) {
			$data['cekmust'] = $cekmust;
			$data['hidden'] = 'n';
			// $this->session->sess_destroy();
		}
		$this->load->view('login', $data);
	}

	public function validationlogin()
	{
		// $this->load->library('session');

		$this->form_validation->set_rules('user', 'username', 'required');
		$this->form_validation->set_rules('pass', 'password', 'required');

		// $user = $this->input->post('username');
		// if (strpbrk($user, "'")) {
		// 	$this->form_validation->set_rules('salah', 'username', 'required');
		// };

		if ($this->form_validation->run() == TRUE) {

			$user = $this->input->post('user');
			$password = $this->input->post('pass');
			$passmd5 = md5($user . $password);
			$checkdata = $this->Login_model->getcountlogin($user, $passmd5);

			$rowlogin = $this->Login_model->getlogindata($user, $passmd5)->row();

			if ($checkdata == 1) {
				$session = array(
					'ses_statuslogin' => true,
					'ses_username' => $rowlogin->username,
					'ses_nama' => $rowlogin->nama,
					'ses_level' => $rowlogin->level,
					'ses_base_url' => base_url()
				);
				$this->session->set_userdata($session);
				$message = "Login Sukses";
				$valid = true;
				$redir = site_url();
			} else {
				$session = array(
					'ses_statuslogin' => false,
				);
				$valid = false;
				$redir = site_url("Login");
				$message = "Login Failed, check your username or password";
				// $userName = $user;
				// $userId = $user;
				// $statuslogin = 0;
				// $valid = $valid;
				// $message = $message;
			}

			$jsonmsg = array(
				"msg" => $message,
				"hasil" => $valid,
				"err_username" => null,
				"err_password" => null,
				"redirecto" => $redir
			);
		} else {
			$jsonmsg = array(
				// "msg" => 'Login Data Failed',
				"msg" => 'Login Data Failed',
				"hasil" => false,
				"redirecto" => site_url("Login")
			);
		}
		echo json_encode($jsonmsg);
	}

	public function register()
	{
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$nama = $this->input->post('nama');

		$passmd5 = md5($user . $pass);
		$rowcek = $this->Master->getby_id('user', 'username', $user)->num_rows();
		if ($rowcek >= 1) {
			$jsonmsg = array(
				"hasil" => false,
				"msg" => "Register Gagal, Username sudah ada",
				"redirecto" => site_url('login'),
			);
		} else {
			$data = array(
				'nama' => $nama,
				'password' => $passmd5,
				'username' => $user,
				'status' => true,
				'level' => 2,
			);
			$this->Master->input_data('user', $data);
			$jsonmsg = array(
				"hasil" => true,
				"msg" => "Register Berhasil, Silahkan Login",
				"redirecto" => site_url('login'),
			);
		}

		echo json_encode($jsonmsg);
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('Login', 'refresh');
	}
}
