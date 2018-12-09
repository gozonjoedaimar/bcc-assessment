<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
	}

	// Frontend User CRUD
	public function index()
	{
		$crud = $this->generate_crud('courses');
		$crud->set_subject('Course List');

		// disable direct create / delete Frontend User
		if ( $this->ion_auth->in_group(array('staff')) ) {
			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();
		}

		$this->mPageTitle = 'Courses';
		$this->render_crud();
	}
}
