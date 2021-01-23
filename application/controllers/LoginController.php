<?php

defined('BASEPATH') or exit('Exit');

/**
 *
 */
class LoginController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
	}

	public function loginView(){
		$this->load->view('login');
	}

	function doLogin(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'password' => md5($password)
		);
		$cek = $this->UserModel->cek_login($where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'name'=>$cek->name,
				'email' => $email,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);

			redirect(base_url(""));

		}else{
			echo "email dan password salah !";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}


}
