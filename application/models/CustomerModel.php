<?php


class CustomerModel extends CI_Model
{
	private $_table = 'm_customer';
	public $name;
	public $alamat;
	public $no_telp;

	public function getAllCustomer()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getCustomerById($id)
	{
		return $this->db->get_where($this->_table,array("id"=>$id))->row();
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
				'field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'required'
			),
			array(
				'field' => 'no_telp',
				'label' => 'No Telp',
				'rules' => 'required'
			)
		);
	}

	public function saveCustomer(){
		$post = $this->input->post();
		$this->name = $post['name'];
		$this->alamat = $post['alamat'];
		$this->no_telp = $post['no_telp'];
		$this->created_at = date('Y-m-d H:i:s');
		return $this->db->insert($this->_table,$this);
	}

	public function deleteCustomer($id){
		return $this->db->delete($this->_table,array("id" => $id));
	}

	public function updateCustomer(){
		$post = $this->input->post();
		$this->name = $post['name'];
		$this->alamat = $post['alamat'];
		$this->no_telp = $post['no_telp'];
		return $this->db->update($this->_table,$this,array("id" => $post['id']));
	}
}
