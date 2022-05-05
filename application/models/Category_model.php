<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function getCategory(): array
	{
		if ($this->db->get('category')) {
			$query = $this->db->get('category');
			return $query->result_array();
		}
		return [];
	}

	/**
	 * @return mixed
	 */
	public function setCategory(): mixed
	{
		$this->load->helper('url');
		$data = [
			'title' => $this->input->post('title'),
		];

		return $this->db->insert('category', $data);
	}

	/**
	 * @param $categoryId
	 * @return mixed
	 */
	public function updateCategory($categoryId): mixed
	{
		$data = [
			'status' => true,
		];
		$this->db->where('id', $categoryId);
		return $this->db->update('category', $data);
	}

	/**
	 * @param $categoryId
	 * @return mixed
	 */
	public function deleteItem($categoryId): mixed
	{
		return $this->db->delete('category', 'id ='.$categoryId);
	}
}
