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
		$this->load->model('TransactionHeaderModel');
		$this->load->model('TransactionDetailModel');
		$this->load->library('form_validation');
	}

	public function listTransaction(){
		$data['transaction'] = $this->TransactionHeaderModel->getAllTransaction();
		return $this->load->view('transaction/list_transaction',$data);
	}

	public function addTransaction(){
		$data['products'] = $this->ProductModel->getAllProduct();
		$data['customers'] = $this->CustomerModel->getAllCustomer();
		return $this->load->view('transaction/add_transaction',$data);
	}

	public function saveTransaction(){
		$trans = $this->TransactionHeaderModel;
		$transDetail = $this->TransactionDetailModel;
		$validation = $this->form_validation;
		$validation->set_rules($trans->rules());

		$trans->saveTransaction();
		$transDetail->saveDetailTransaction();
		$this->session->set_flashdata('success','Save Transaction Success...');
		return  redirect('transaction/list');
	}

	// untuk load halaman edit transaksi
	public function editTransaction(){
		$id = $this->input->get('id',true);
		$data['product'] = $this->ProductModel->getAllProduct();
		$data['customers'] = $this->CustomerModel->getAllCustomer();
		$data['transaction'] = $this->TransactionHeaderModel->getTransactionById($id);
		$data['transaction_detail'] = $this->TransactionDetailModel->getDetailTransactionById($id);
		return $this->load->view('transaction/edit_transaction',$data);
	}


	// untuk hapus data
	public function deleteTransaction()
	{
		$post = $this->input->post();
		$deleteTransaction = $this->TransactionHeaderModel->deleteTransaction($post['id']);
		$deleteDetailTransaction = $this->TransactionDetailModel->deleteDetailTransaction($post['id']);
		if (!empty($deleteTransaction) && !empty($deleteDetailTransaction)){
			$this->session->set_flashdata('success','Delete Transaction Success...');
		}else{
			$this->session->set_flashdata('error','Delete Transaction Failed...');
		}
		return  redirect('transaction/list');
	}

	// update data transaksi
	public function updateTransaction(){
		$trans = $this->TransactionHeaderModel;
		$validation = $this->form_validation;
		$validation->set_rules($trans->rules());

		$trans->updateTransaction();
		$this->session->set_flashdata('success','Save Transaction Success...');
		return  redirect('transaction/list');

	}

}
