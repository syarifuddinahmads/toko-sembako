<?php

defined('BASEPATH') OR exit('Exit');

/**
 *
 */
class ProductCategoryController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('ProductCategoryModel');
		$this->load->library('form_validation');
	}

	public function listCategoryProduct(){
		$data['category_product'] = $this->ProductCategoryModel->getAllProductCategory();
		return $this->load->view('product-category/list_category_product',$data);
	}

	public function editCategoryProduct(){
		$id = $this->input->get('id',true);
		$data['category_product'] = $this->ProductCategoryModel->getProductCategoryById($id);
		return $this->load->view('product-category/edit_category_product',$data);
	}

	// untuk load halaman tambah produk
	public function addCategoryProduct(){
		return $this->load->view('product-category/add_category_product');
	}

	// untuk simpan data
	public function saveCategoryProduct()
	{
		$productCategory = $this->ProductCategoryModel;
		$validation = $this->form_validation;
		$validation->set_rules($productCategory->rules());

		if ($validation->run()){
			$productCategory->saveCategoryProduct();
			$this->session->set_flashdata('success','Save Product Category Success...');
			return  redirect('product/category/list');
		}else{
			$data['category_product'] = $this->ProductCategoryModel->getAllProductCategory();
			return $this->load->view('product-category/add_category_product',$data);
		}


	}


	// untuk hapus data
	public function deleteCategoryProduct()
	{
		$post = $this->input->post();
		$deleteProductCategory = $this->ProductCategoryModel->deleteCategoryProduct($post['id']);
		if (!empty($deleteProductCategory)){
			$this->session->set_flashdata('success','Delete Product Category Success...');
		}else{
			$this->session->set_flashdata('error','Delete Product Category Failed...');
		}
		return  redirect('product/category/list');
	}

	// untuk update data
	public function updateCategoryProduct(){
		$productCategory = $this->ProductCategoryModel;
		$validation = $this->form_validation;
		$validation->set_rules($productCategory->rules());

		if ($validation->run()){
			$productCategory->updateCategoryProduct();
			$this->session->set_flashdata('success','Update Product Category Success...');
			return  redirect('product/category/list');
		}else{
			$post = $this->input->post();
			$data['category_product'] = $this->ProductCategoryModel->getProductCategoryById($post['id']);
			return $this->load->view('product/category/edit?id='.$post['id']);
		}

	}


}
