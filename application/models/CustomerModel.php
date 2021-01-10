<?php


class CustomerModel extends CI_Model
{
	private $_table = 'm_customer';
	public $name;
	public $alamat;
	public $noTelp;

	public function getAllCustomer()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getCustomerById($id)
	{
		return $this->db->get_where($this->_table,array("id"=>$id))->row();
	}
}
