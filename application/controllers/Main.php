<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @class Main
 */
class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('item_model');
		$this->load->model('category_model');
		$this->load->helpers('status_helper');
	}

	/**
	 * @return void
	 */
	public function index(): void
	{
			$this->load->library('form_validation');
			$data['title'] = 'Main Page';
			$data['items'] = $this->item_model->getItem();
			$data['categories'] = $this->category_model->getCategory();

			$this->mainIndexViewLoad($data);
	}

	public function addItem()
	{
		if ($this->input->method() == 'post') {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('category_id', 'Category', 'required');

			if ($this->form_validation->run()) {
				$this->item_model->setItem();
				$data = $this->item_model->getItem();
				$items = [];
				foreach ($data as $item) {
					$item['status'] = Status_helper::isBuy($item['status']);
					$item['category_id'] = Status_helper::whichCategory($item['category_id']);
					$item['time'] = Status_helper::whichTime($item['time']);
					$items[] = $item;
				}
				echo json_encode($items);
			}
		}
	}

	/**
	 * @param array $data
	 * @return void
	 */
	public function mainIndexViewLoad(array $data): void
	{
		$this->load->view('templates/header', $data);
		$this->load->view('main/index', $data);
		$this->load->view('templates/footer');
	}

	/**
	 * @param int $itemId
	 * @return void
	 */
	public function updateStatusItem(int $itemId): void
	{
		$this->item_model->updateStatus($itemId);
	}

	/**
	 * @param int $itemId
	 * @return void
	 */
	public function deleteItem(int $itemId): void
	{
		$this->item_model->deleteItem($itemId);
	}
}
