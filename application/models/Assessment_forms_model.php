<?php 

class Assessment_forms_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$CI =& get_instance();
		$CI->load->library('form_builder');

		$this->assessment_form = $CI->form_builder->create_form();
		$this->assessment_form->set_post_url('admin/assessment/save_assessment_form');
		$this->assessment_form->set_rule_group('assessment/save_assessment_form');
		$this->assessment_form->set_id('assessment_form');
		$this->assessment_form->set_form_url('admin/assessment/create');
		
		$this->statement_of_account = $CI->form_builder->create_form();
		$this->statement_of_account->set_post_url('admin/assessment/save_statement_of_account');
		$this->statement_of_account->set_rule_group('assessment/save_statement_of_account');
		$this->statement_of_account->set_id('statement_of_account');
		$this->statement_of_account->set_form_url('admin/assessment/create');

	}

	public $assessment_form;
	public $statement_of_account;
}