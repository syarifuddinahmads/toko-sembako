<?php
defined('BASEPATH') OR exit('Exit');
/**
 * 
 */
class User_model extends CI_Model
{
	
	
	private $_table ='m_user';

	public $name;
	public $email:
	public $password;
	public $status;

	public function getAllUser()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getUserById($id)
	{
		return $this->db->get_where($this->_table,["id"=>$id])->row();
	}

}