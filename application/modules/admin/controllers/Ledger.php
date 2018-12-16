<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ledger extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
		$this->load->model('assessment_forms_model','assessment_forms');
	}

	// Frontend User CRUD
	public function index()
	{
		$crud = $this->generate_crud('students');
		$crud->columns('student_id','first_name', 'last_name', 'middle_name', 'gender');
		$crud->display_as('student_id', 'Student ID');
		$crud->display_as('last_name', 'Last Name');
		$crud->display_as('first_name', 'First Name');
		$crud->display_as('middle_name', 'Middle Name');
		$crud->set_subject('Students');

		$crud->callback_column('gender', array($this, 'ucfirst'));

		$crud->field_type('gender', 'dropdown');

		// only webmaster and admin can change member groups
		if ($crud->getState()=='list' || $this->ion_auth->in_group(array('webmaster', 'admin')))
		{
			$crud->set_relation_n_n('groups', 'users_groups', 'groups', 'user_id', 'group_id', 'name');
		}

		$crud->add_action('View', '', 'admin/ledger/view', 'fa fa-eye');

		// disable direct create / delete Frontend User
		$crud->unset_add();
		$crud->unset_print();
		$crud->unset_export();
		$crud->unset_read();
		$crud->unset_edit();
		$crud->unset_delete();

		$this->mPageTitle = 'Ledger';
		$this->render_crud();
	}

	public function view($id = NULL, $session = NULL)
	{
		if ( ! $id) show_404();
		$form = $this->assessment_forms;
		
		/* Prepare form */
		$form->student_information->set_post_url('admin/ledger/save_student_information/' . $id);
		$student_information_data = $this->get_student_information_data($id);
		$form->set_form_data("student_information", $student_information_data);
		if ( $session === NULL ) redirect('admin/ledger/view/' . $id . "/" . md5(time()));

		$this->mViewData['form'] = $form;
		$this->mPageTitle = "Student Ledger";
		$this->render('student/ledger');
	}

	public function save_student_information($id = NULL) 
	{
		if ( ! $id) show_404();
		
		/* Prepare form */
		$form = $this->assessment_forms;
		$form_url = 'admin/ledger/view/' . $id . "/" . md5(time());
		$form->student_information->set_form_url($form_url);

		if ($form->student_information->validate()) {

			$post_data = $this->input->post();

			foreach ($post_data as $key => $value) {
				$this->db->set($key, $value);
			}
			$this->db->where('id', $id);
			
			if ($this->db->update('students')) {
				$this->system_message->add_success('Student Information Updated');
				$student_information_data = $this->get_student_information_data($id);
				$form->set_form_data("student_information", $student_information_data);
			}
			else {
				$this->system_message->add_error('Unable to save student information');
				$form->set_form_data("student_information", $post_data);
			}

			redirect($form_url);
		}
	}

	public function get_student_information($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('students');
	}

	public function get_student_information_data($id)
	{
		$query = $this->get_student_information($id);
		$info = $query->row_array();

		// $info['course_code'] = strtoupper($info['course_code']);
		// $info['gender'] = ucfirst($info['gender']);

		return $info;
	}

	public function ucfirst($value, $row) 
	{
		return ucfirst($value);
	}
}
