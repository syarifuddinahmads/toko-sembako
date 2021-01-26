<?php


class TransactionDetailModel extends CI_Model
{
	private $_table = "d_transaction";
	public $id_product;
	public $code_transaction;
	public $qty;
	public $price;
	public $subtotal;
	public $created_at;


	public function getAllDetailTransaction()
	{
		$this->db->select('*');
		$this->db->from('d_transaction dt');
		$this->db->join('m_product mp', 'mp.id=dt.id_product');
		$query = $this->db->get();
		return $query->result();
	}

	public function getDetailTransactionById($id)
	{
		$this->db->select('*');
		$this->db->from('d_transaction dt');
		$this->db->join('m_product mp', 'mp.id=dt.id_product');
		$this->db->where(array("dt.code_transaction" => $id));
		$query = $this->db->get();
		return $query->result();
	}

	public function rules()
	{
		return array(
			array(
				'field' => 'id_product',
				'label' => 'Product',
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
				'field' => 'qty',
				'label' => 'Quantity',
				'rules' => 'required'
			),
			array(
				'field' => 'price',
				'label' => 'Price',
				'rules' => 'required'
			),
		);
	}

	public function saveDetailTransaction()
	{
		$post = $this->input->post();
		$id_product = $this->input->post('id_product');
		$qty = $this->input->post('qty');
		$price = $this->input->post('price');
		$subtotal = 0;
		$detailTrans = array();
		for ($i = 0; $i < count($id_product); $i++) {
			$detailTrans[$i] = array(
				'id_product' => $id_product[$i],
				'code_transaction' => $post['code_transaction'],
				'created_at' => date('Y-m-d H:i:s'),
				'price' => $price[$i],
				'qty' => $qty[$i],
				'subtotal' => $price[$i] * $qty[$i]
			);
			$subtotal += $price[$i] * $qty[$i];
		}

		$this->db->where('code_transaction',$post['code_transaction'])->update('h_transaction',array('grandtotal'=>$subtotal));

		return $this->db->insert_batch($this->_table, $detailTrans);
	}

	public function deleteDetailTransaction($id)
	{
		return $this->db->delete($this->_table, array("code_transaction" => $id));
	}

}
