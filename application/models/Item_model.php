<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * @return array
	 */
	public function getItem(): array
	{
		if ($query = $this->db->get('item')) {
			return $query->result_array();
		}
		$query = $this->db->get('item');
		return $query->row_array();
	}

	/**
	 * @return mixed
	 */
	public function setItem(): mixed
	{
		$this->load->helper('url');
		$data = [
			'title' => $this->input->post('title'),
			'category_id' => $this->input->post('category_id'),
		];

		return $this->db->insert('item', $data);
	}

	/**
	 * @param $itemId
	 * @return mixed
	 */
	public function updateStatus($itemId): mixed
	{
		$data = [
			'status' => true,
		];
		$this->db->where('id', $itemId);
		return $this->db->update('item', $data);
	}

	/**
	 * @param $itemId
	 * @return mixed
	 */
	public function deleteItem($itemId): mixed
	{
		return $this->db->delete('item', 'id ='.$itemId);
	}
}
