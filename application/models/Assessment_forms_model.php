<?php 

class Assessment_forms_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
		$this->CI->load->library('form_builder');

		$this->assessment_form = $this->CI->form_builder->create_form();
		$this->assessment_form->set_post_url('admin/assessment/save_assessment_form');
		$this->assessment_form->set_rule_group('assessment/save_assessment_form');
		$this->assessment_form->set_id('assessment_form');
		$this->assessment_form->set_form_url('admin/assessment/create');
		
		$this->statement_of_account = $this->CI->form_builder->create_form();
		$this->statement_of_account->set_post_url('admin/assessment/save_statement_of_account');
		$this->statement_of_account->set_rule_group('assessment/save_statement_of_account');
		$this->statement_of_account->set_id('statement_of_account');
		$this->statement_of_account->set_form_url('admin/assessment/create');

	}

	public $CI;
	public $assessment_form;
	public $statement_of_account;

	public function get_year_options()
	{
		$year_level = array(
			"1" => "First",
			"2" => "Second",
			"3" => "Third",
			"4" => "Forth",
		);

		return $year_level;
	}

	public function get_course_options($full = FALSE)
	{
		$list = array();
		$db = $this->CI->db;
		$query = $db->get('courses');

		foreach ($query->result() as $course) {
			$list[$course->code] = $full ? $couse->name: $course->code;
		}

		return $list;
	}

	public function checkbox($name, $value, $form_builder, $extras = array()) 
	{
		if ( ! $value) $value = $name;

		$checked = FALSE;
		$field_value = $form_builder->get_field_value($name);
		if ($field_value && $field_value == $value) $checked = TRUE;

		return form_checkbox($name, $value, $checked, $extras);
	}

	public function dropdown($name, $options, $form_builder, $extras = array())
	{
		return $form_builder->field_dropdown($name, $options, $form_builder->get_field_value($name), $extras);
	}

	public function bs3_dropdown($label, $name, $options, $form_builder, $extras = array())
	{
		if ( ! isset($extras['class'])) $extras['class'] = "form-control";
		$html  = "<div class=\"form-group\">";
		$html .= form_label($label) . $this->dropdown($name, $options, $form_builder, $extras);
		$html .= "</div>";
		return $html;
	}
}