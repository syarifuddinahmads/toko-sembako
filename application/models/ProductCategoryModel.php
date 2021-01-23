<?php

/**
 *
 */
class ProductCategoryModel extends CI_Model
{


	private $_table = 'm_category_product';

	public $name;

	public function getAllProductCategory()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getProductCategoryById($id)
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
			)
		);
	}

	public function saveCategoryProduct(){
		$post = $this->input->post();
		$this->name = $post['name'];
		$this->created_at = date('Y-m-d H:i:s');
		return $this->db->insert($this->_table,$this);
	}

	public function deleteCategoryProduct($id){
		return $this->db->delete($this->_table,array("id" => $id));
	}

	public function updateCategoryProduct(){
		$post = $this->input->post();
		$this->name = $post['name'];
		return $this->db->update($this->_table,$this,array("id" => $post['id']));
	}

}
