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

			$is_new_student = FALSE;

			if ($form->student_id_exists($post_data['student_id'])) {
				$this->db->where('student_id', $post_data['student_id']);
				$this->db->set('student_id', $post_data['student_id']);
				$student_saved = $this->db->update('students');
			}
			else {
				/* Save new student info */
				$this->db->set('last_name', $post_data['last_name']);
				$this->db->set('first_name', $post_data['first_name']);
				$this->db->set('middle_name', $post_data['middle_name']);
				$this->db->set('student_id', $post_data['student_id']);
				$this->db->set('course_code', $post_data['course_code']);
				$student_saved = $this->db->insert('students');
				$is_new_student = TRUE;
			}

			if ( ! $student_saved) {
				$this->system_message->add_error("Assessment Form: Unable to save assessment. An error occured.");
			}
			else {
				if ($is_new_student) {
					$this->system_message->add_success("Student information saved");
				}
				else {
					if ($this->db->limit(1)->get_where('assessment_group', array(
						'student_id'=>$post_data['student_id'],
						'year_level'=>$post_data['year_level'],
						'course_code'=>$post_data['course_code'] ))->num_rows() === 1)
					{
						$this->system_message->add_error("Assessment Form: Unable to save assessment. Account already created for year level: <b><u>" . $post_data['year_level'] . "</u></b>");
						return redirect('admin/assessment/create');
					}
				}	

				/* Save account balance */
				$this->db->set('student_id', $post_data['student_id']);
				$this->db->set('year_level', $post_data['year_level']);
				$this->db->set('course_code', $post_data['course_code']);
				$this->db->set('balance', $post_data['total_fees']);
				$saved = $this->db->insert('assessment_group');

				if ( ! $saved) {
					$this->system_message->add_error("Assessment Form: Unable to save assessment. An error occured.");
				}
				else {
					$assessment_id = $this->db->insert_id();

					/* Save assessment */
					$this->db->set('assessment_group', $assessment_id);
					$this->db->set('form_type', $post_data['form_type']);
					$this->db->set('paid', 0); // Set unpaid
					$this->db->set('payment', $post_data['payment_stated']);
					$assessment_saved = $this->db->insert('assessment');

					if ( ! $assessment_saved) {
						$this->system_message->add_error("Assessment Form: Unable to save assessment. An error occured.");
					}
					else {
						if ($is_new_student) {
							$this->system_message->add_success("Account created for new student");
						}
						else {
							$this->system_message->add_success("Account added for existing student");
						}
					}

					$form->set_form_data('assessment_form', []);	
				}
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

			$required = ['examterm', 'old_account', 'certification', 'description'];
			$valid = FALSE; $description = [];

			foreach ($required as $field) {
				if (isset($post_data[$field]) && $post_data[$field]) {
					$description[] = $post_data[$field];
					$valid = TRUE;
				}
			}

			if ( ! $valid) {
				$this->system_message->add_error("Please fill up fees");
				return redirect('admin/assessment/create');
			}


			if ($form->student_id_exists($post_data['student_id'])) {
				$student_account = $form->get_account($post_data['student_id'], $post_data['year_level'], $post_data['course_code']);
				if ($student_account->num_rows() === 1) {
					$account = $student_account->row();

					/* Save assessment */
					$this->db->set('assessment_group', $account->id);
					$this->db->set('form_type', $post_data['form_type']);
					$this->db->set('paid', 0); // Set unpaid
					$this->db->set('payment', $post_data['payment_stated']);
					$this->db->set('description', implode(' | ', $description));
					$assessment_saved = $this->db->insert('assessment');

					if ($assessment_saved)  {
						$form->set_form_data('statement_of_account', []);
						$this->system_message->add_success('Update has been added to the student ledger');
					}
					else {
						$this->system_message->add_error('Unable to save assessment. An error occured.');
					}
				}
				else {
					$this->system_message->add_error('No account found. Check the following fields: Course, Year Level, Student ID');
				}
			}
			else {
				$this->system_message->add_error('Student does not exists!');
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
