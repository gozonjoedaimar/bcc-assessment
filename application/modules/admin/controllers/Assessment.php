<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessment extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
		$this->load->model('assessment_forms_model','assessment_forms');
		$this->add_stylesheet('assets/local/css/local.css');
		$this->add_script('assets/local/js/local.js');
	}

	// Frontend User CRUD
	public function index()
	{
		/* Redirect index to create page */
		return redirect('admin/assessment/create');
	}

	public function save_assessment_form() 
	{
		$form = $this->assessment_forms;
		$post_data = $this->input->post();
		if ($form->assessment_form->validate())
		{
			$this->system_message->add_error('Assessment Form: Form validated but unable to save at the moment');
			$form->set_form_data('assessment_form', $post_data);
			redirect('admin/assessment/create');
		}
	}

	public function save_statement_of_account() 
	{
		$form = $this->assessment_forms;
		$post_data = $this->input->post();
		if ($form->statement_of_account->validate())
		{
			$this->system_message->add_error('Statement of Account: Form validated but unable to save at the moment');
			$form->set_form_data('statement_of_account', $post_data);
			redirect('admin/assessment/create');
		}
	}

	// Create Frontend User
	public function create()
	{
		// $form = $this->form_builder->create_form();
		$form_helper = $this->form_builder->create_form();
		$form = $this->assessment_forms;

		$this->mViewData['debug'] = property_exists($this, 'assessment_forms');

		// get list of Frontend user groups
		$this->load->model('group_model', 'groups');
		$this->mViewData['groups'] = $this->groups->get_all();
		$this->mPageTitle = 'Assessment';

		$this->mViewData['form'] = $form;
		$this->mViewData['form_helper'] = $form_helper;
		$this->render('assessment/create');
	}

	// User Groups CRUD
	public function group()
	{
		$crud = $this->generate_crud('groups');
		$this->mPageTitle = 'User Groups';
		$this->render_crud();
	}
}
