<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
	}

	// Frontend User CRUD
	public function index()
	{
		$crud = $this->generate_crud('subjects');
		$crud->set_subject('List');

		// disable direct create / delete Frontend User
		// $crud->unset_add();
		// $crud->unset_delete();

		$this->mPageTitle = 'Subjects';
		$this->render_crud();
	}
}
