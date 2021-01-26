<?php


class TransactionController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("login"));
		}
		$this->load->model('ProductModel');
		$this->load->model('CustomerModel');
		$this->load->library('form_validation');
	}

	public function listTransaction(){
		return $this->load->view('transaction/list_transaction');
	}

	public function addTransaction(){
		$data['products'] = $this->ProductModel->getAllProduct();
		$data['customers'] = $this->CustomerModel->getAllCustomer();
		return $this->load->view('transaction/add_transaction',$data);
	}

}
