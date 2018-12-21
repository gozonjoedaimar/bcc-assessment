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
			$form->set_form_data('assessment_form', $post_data);

			if ($form->student_id_exists($post_data['student_id'])) {
				$this->system_message->add_error('Assessment Form: Student exists! New balance should be recorded but not at the moment.');
			}
			else {
				$this->system_message->add_error('Assessment Form: New Student! Form validated but unable to save at the moment');
			}

			redirect('admin/assessment/create');
		}
	}

	public function save_statement_of_account() 
	{
		$form = $this->assessment_forms;
		$post_data = $this->input->post();
		if ($form->statement_of_account->validate())
		{
			$form->set_form_data('statement_of_account', $post_data);

			if ($form->student_id_exists($post_data['student_id'])) {
				$this->system_message->add_error('Statement of Account: Student exists! New balance should be recorded but not at the moment.');
			}
			else {
				$this->system_message->add_error('Statement of Account: Student does not exists! Form validated but unable to save at the moment');
			}
			
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
}
