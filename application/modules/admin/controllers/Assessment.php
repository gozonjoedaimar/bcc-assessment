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
		// $crud = $this->generate_crud('ledger');
		// $crud->columns('firstName', 'lastName', 'email');
		// $crud->display_as('lastName', 'Last Name');
		// $crud->display_as('firstName', 'First Name');
		// $crud->set_subject('List');

		// $crud->fields(['firstName','lastName','email']);

		// // only webmaster and admin can change member groups
		// if ($crud->getState()=='list' || $this->ion_auth->in_group(array('webmaster', 'admin')))
		// {
		// 	$crud->set_relation_n_n('groups', 'users_groups', 'groups', 'user_id', 'group_id', 'name');
		// }

		// // only webmaster and admin can reset user password
		// if ($this->ion_auth->in_group(array('webmaster', 'admin')))
		// {
		// 	$crud->add_action('Reset Password', '', 'admin/user/reset_password', 'fa fa-repeat');
		// }

		// // disable direct create / delete Frontend User
		// // $crud->unset_add();
		// $crud->unset_delete();

		// $this->mPageTitle = 'Ledger';
		// $this->render_crud();
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

	// Frontend User Reset Password
	public function reset_password($user_id)
	{
		// only top-level users can reset user passwords
		$this->verify_auth(array('webmaster', 'admin'));

		$form = $this->form_builder->create_form();
		if ($form->validate())
		{
			// pass validation
			$data = array('password' => $this->input->post('new_password'));
			
			// [IMPORTANT] override database tables to update Frontend Users instead of Admin Users
			$this->ion_auth_model->tables = array(
				'users'				=> 'users',
				'groups'			=> 'groups',
				'users_groups'		=> 'users_groups',
				'login_attempts'	=> 'login_attempts',
			);

			// proceed to change user password
			if ($this->ion_auth->update($user_id, $data))
			{
				$messages = $this->ion_auth->messages();
				$this->system_message->set_success($messages);
			}
			else
			{
				$errors = $this->ion_auth->errors();
				$this->system_message->set_error($errors);
			}
			refresh();
		}

		$this->load->model('user_model', 'users');
		$target = $this->users->get($user_id);
		$this->mViewData['target'] = $target;

		$this->mViewData['form'] = $form;
		$this->mPageTitle = 'Reset User Password';
		$this->render('user/reset_password');
	}
}
