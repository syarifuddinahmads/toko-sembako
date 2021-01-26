<?php


class CustomerController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('CustomerModel');
		$this->load->library('form_validation');
	}

	// untuk menampilkan data customer
	public function listCustomer()
	{

		$data['customers'] = $this->CustomerModel->getAllCustomer();

		return $this->load->view('customer/list_customer',$data);
	}

	// untuk load halaman tambah customer
	public function addCustomer()
	{
		return $this->load->view('customer/add_customer');
	}

	// untuk simpan data
	public function saveCustomer()
	{
		$customer = $this->CustomerModel;
		$validation = $this->form_validation;
		$validation->set_rules($customer->rules());

		if ($validation->run()){
			$customer->saveCustomer();
			$this->session->set_flashdata('success','Save Customer Success...');
			return  redirect('customer/list');
		}else{
			return $this->load->view('customer/add_customer');
		}


	}

	// untuk load halaman edit customer
	public function editCustomer(){
		$id = $this->input->get('id',true);
		$data['customer'] = $this->CustomerModel->getCustomerById($id);
		return $this->load->view('customer/edit_customer',$data);
	}


	// untuk hapus data
	public function deleteCustomer()
	{
		$post = $this->input->post();
		$deleteCustomer = $this->CustomerModel->deleteCustomer($post['id']);
		if (!empty($deleteCustomer)){
			$this->session->set_flashdata('success','Delete Customer Success...');
		}else{
			$this->session->set_flashdata('error','Delete Customer Failed...');
		}
		return  redirect('customer/list');
	}

	// untuk update data
	public function updateCustomer(){
		$Customer = $this->CustomerModel;
		$validation = $this->form_validation;
		$validation->set_rules($Customer->rules());

		if ($validation->run()){
			$Customer->updateCustomer();
			$this->session->set_flashdata('success','Update Customer Success...');
			return  redirect('customer/list');
		}else{
			$post = $this->input->post();
			$data['customer'] = $this->CustomerModel->getCustomerById($post['id']);
			return $this->load->view('customer/edit?id='.$post['id']);
		}

	}
}
