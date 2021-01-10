<?php

defined('BASEPATH') or exit('Exit');

/**
 *
 */
class ProductModel extends CI_Model
{

	private $_table = "m_product";

	public $name;
	public $price;
	public $stock;
	public $category;
	public $status;
	public $created_at;

	public function getAllProduct()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getProductById($id)
	{
		return $this->db->get_where($this->_table, array("id" => $id))->row();
	}

	public function rules()
	{
		return array(
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required'
			),
			array(
				'field' => 'price',
				'label' => 'Price',
				'rules' => 'required'
			),
			array(
				'field' => 'stock',
				'label' => 'Stock',
				'rules' => 'required'
			),
			array(
				'field' => 'category',
				'label' => 'Category',
				'rules' => 'required'
			),
			array(
				'field' => 'status',
				'label' => 'Status',
				'rules' => 'required'
			),
		);
	}

	public function saveProduct(){
		$post = $this->input->post();
		$this->name = $post['name'];
		$this->price = $post['price'];
		$this->stock = $post['stock'];
		$this->status = $post['status'];
		$this->category = $post['category'];
		$this->created_at = date('Y-m-d H:i:s');
		return $this->db->insert($this->_table,$this);
	}

	public function deleteProduct($id){
		return $this->db->delete($this->_table,array("id" => $id));
	}
}
