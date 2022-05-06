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
	public function index(): void
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');

		$data['title'] = 'Category Page';
		$data['categories'] = $this->category_model->getCategory();

		if ($this->form_validation->run())
		{
			$this->category_model->setCategory();
			$this->categoryIndexViewLoad($data);
		}
		$this->categoryIndexViewLoad($data);
	}

	public function categoryIndexViewLoad(array $data): void
	{
		$this->load->view('templates/header', $data);
		$this->load->view(base_url().'category/index', $data);
		$this->load->view('templates/footer');
	}

	/**
	 * @param int $categoryId
	 * @return void
	 */
	public function updateStatusCategory(int $categoryId): void
	{
		$this->category_model->updateStatus($categoryId);
	}

	/**
	 * @param int $categoryId
	 * @return void
	 */
	public function deleteCategory(int $categoryId): void
	{
		$this->category_model->deleteItem($categoryId);
	}
}
