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

}
