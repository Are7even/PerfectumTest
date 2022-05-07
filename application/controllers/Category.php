<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @class Category
 */
class Category extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->helpers('status_helper');
	}

	/**
	 * @return void
	 */
	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');

		$data['title'] = 'Category Page';
		$data['categories'] = $this->category_model->getCategory();

		if ($this->form_validation->run())
		{
			$this->category_model->setCategory();
			return $this->categoryIndexViewLoad($data);
		}
		return $this->categoryIndexViewLoad($data);
	}

	public function categoryIndexViewLoad(array $data): void
	{
		$this->load->view('templates/header', $data);
		$this->load->view('category/index', $data);
		$this->load->view('templates/footer');
	}

	/**
	 * @param int $categoryId
	 * @return void
	 */
	public function updateStatusCategory(int $categoryId): void
	{
		$this->category_model->updateCategory($categoryId);
		$data = $this->category_model->getCategoryById($categoryId);
		echo json_encode(['status' => Status_helper::isActive($data['status'])]);
	}

	/**
	 * @param int $categoryId
	 * @return void
	 */
	public function deleteCategory(int $categoryId): void
	{
		$this->category_model->deleteCategory($categoryId);
		echo json_encode([]);
	}
}
