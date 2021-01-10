<?php

defined('BASEPATH') OR exit('Exit');

/**
 * 
 */
class ProductController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('ProductModel');
		$this->load->model('ProductCategoryModel');
		$this->load->library('form_validation');
	}

	// untuk menampilkan data produk
	public function listProduct()
	{

		$data['products'] = $this->ProductModel->getAllProduct();

		return $this->load->view('product/list_product',$data);
	}

	// untuk load halaman tambah produk
	public function addProduct(){
		$data['category_product'] = $this->ProductCategoryModel->getAllProductCategory();
		return $this->load->view('product/add_product',$data);
	}

	// untuk simpan data
	public function saveProduct()
	{
		$product = $this->ProductModel;
		$validation = $this->form_validation;
		$validation->set_rules($product->rules());

		if ($validation->run()){
			$product->saveProduct();
			$this->session->set_flashdata('success','Save Product Success...');
			return  redirect('product/list');
		}else{
			$data['category_product'] = $this->ProductCategoryModel->getAllProductCategory();
			return $this->load->view('product/add_product',$data);
		}


	}

	// untuk load halaman edit produk
	public function editProduct(){
		$id = $this->input->get('id',true);
		$data['product'] = $this->ProductModel->getProductById($id);
		$data['category_product'] = $this->ProductCategoryModel->getAllProductCategory();
		return $this->load->view('product/edit_product',$data);
	}


	// untuk hapus data 
	public function deleteProduct()
	{
		$post = $this->input->post();
		$deleteProduct = $this->ProductModel->deleteProduct($post['id']);
		if (!empty($deleteProduct)){
			$this->session->set_flashdata('success','Delete Product Success...');
		}else{
			$this->session->set_flashdata('error','Delete Product Failed...');
		}
		return  redirect('product/list');
	}

	// untuk update data
	public function updateProduct(){
		$product = $this->ProductModel;
		$validation = $this->form_validation;
		$validation->set_rules($product->rules());

		if ($validation->run()){
			$product->updateProduct();
			$this->session->set_flashdata('success','Update Product Success...');
			return  redirect('product/list');
		}else{
			$post = $this->input->post();
			$data['product'] = $this->ProductModel->getProductById($post['id']);
			$data['category_product'] = $this->ProductCategoryModel->getAllProductCategory();
			return $this->load->view('product/edit?id='.$post['id']);
		}

	}

}
