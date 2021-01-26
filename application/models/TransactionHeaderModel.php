<?php


class TransactionHeaderModel extends CI_Model
{
	private $_table = "h_transaction";
	public $id_customer;
	public $code_transaction;
	public $date_transaction;
	public $date_payment;
	public $type_shipping;
	public $payment_status;
	public $grandtotal;
	public $created_at;


	public function getAllTransaction()
	{
		$this->db->select('*');
		$this->db->from('h_transaction ht');
		$this->db->join('m_customer mc', 'mc.id=ht.id_customer');
		$query = $this->db->get();
		return $query->result();
	}

	public function getTransactionById($id)
	{
		$this->db->select('*');
		$this->db->from('h_transaction ht');
		$this->db->join('m_customer mc', 'mc.id=ht.id_customer');
		$this->db->where(array("ht.code_transaction" => $id));
		$query = $this->db->get();
		return $query->row();
	}

	public function rules()
	{
		return array(
			array(
				'field' => 'id_customer',
				'label' => 'Customer',
				'rules' => 'required'
			),
			array(
				'field' => 'code_transaction',
				'label' => 'Code Transaction',
				'rules' => 'required'
			),
			array(
				'field' => 'subtotal',
				'label' => 'Subtotal',
				'rules' => 'required'
			),
			array(
				'field' => 'type_shipping',
				'label' => 'Type Shipping',
				'rules' => 'required'
			),
			array(
				'field' => 'payment_status',
				'label' => 'Payment Status',
				'rules' => 'required'
			)
		);
	}

	public function saveTransaction(){
		$post = $this->input->post();
		$this->id_customer = $post['id_customer'];
		$this->code_transaction = $post['code_transaction'];
		$this->created_at = date('Y-m-d H:i:s');
		$this->date_transaction = $this->created_at;
		$this->payment_status = $post['payment_status'];
		$this->date_payment = $post['payment_status'] == 1 ? $this->created_at:null;
		$this->type_shipping = $post['type_shipping'];
		$this->grandtotal = 0;
		return $this->db->insert($this->_table,$this);
	}

	public function deleteTransaction($id){
		return $this->db->delete($this->_table,array("code_transaction" => $id));
	}

	public function updateTransaction(){
		$post = $this->input->post();
		$this->id_customer = $post['id_customer'];
		$this->code_transaction = $post['code_transaction'];
		$this->created_at = date('Y-m-d H:i:s');
		$this->date_transaction = $this->created_at;
		$this->payment_status = $post['payment_status'];
		$this->date_payment = $post['payment_status'] == 1 ? $this->created_at:null;
		$this->type_shipping = $post['type_shipping'];
		$this->grandtotal = $post['grandtotal'];
		return $this->db->update($this->_table,$this,array("code_transaction" => $post['code_transaction']));
	}
}
