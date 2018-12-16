<?php 

class Assessment_forms_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
		$this->CI->load->library('form_builder');

		/* Create instance for assessment form */
		$this->assessment_form = $this->CI->form_builder->create_form();
		$this->assessment_form->set_post_url('admin/assessment/save_assessment_form');
		$this->assessment_form->set_rule_group('assessment/save_assessment_form');
		$this->assessment_form->set_id('assessment_form');
		$this->assessment_form->set_form_url('admin/assessment/create');
		
		/* Create instance for statement of account form */
		$this->statement_of_account = $this->CI->form_builder->create_form();
		$this->statement_of_account->set_post_url('admin/assessment/save_statement_of_account');
		$this->statement_of_account->set_rule_group('assessment/save_statement_of_account');
		$this->statement_of_account->set_id('statement_of_account');
		$this->statement_of_account->set_form_url('admin/assessment/create');
		
		/* Create instance for student information form */
		$this->student_information = $this->CI->form_builder->create_form();
		$this->student_information->set_rule_group('ledger/save_student_information');
		$this->student_information->set_id('student_information');

	}

	public $CI;
	public $assessment_form;
	public $statement_of_account;
	public $student_information;

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

	public function show_hidden($name, $value = NULL, $form_builder = NULL, $extras = array())
	{
		/* Prepare value */
		if ( ! $value && $form_builder) {
			$field_value = $form_builder->get_field_value($name);
			if ($field_value) {
				$value = $field_value;
			}
		}

		$class = implode(" ", $extras);

		$html  = form_hidden($name, $value);
		$html .= '<span class="border-bottom full-width text-right show-hidden ' . $class . '">';
		$html .= $value ? $value: "--";
		$html .= '</span>';
		return $html;
	}

	public function set_form_data($form_id, $form_data) 
	{
		$session_key = 'form-'.$form_id;
		$this->CI->session->set_flashdata($session_key, $form_data);
	}

	public function bs3_textarea($label, $name, $value, $form_builder, $extras = array())
	{
		/* Prepare appearance */
		if ( ! isset($extras['class'])) $extras['class'] = "form-control";
		if ( ! isset($extras['rows'])) $extras['rows'] = 2;

		/* Prepare value */
		if ( ! $value && $form_builder) {
			$field_value = $form_builder->get_field_value($name);
			if ($field_value) {
				$value = $field_value;
			}
		}

		/* Prepare textarea options */
		$options = $extras;
		$options['name'] = $name;
		$options['value'] = $value;

		$html  = "<div class=\"form-group\">";
		$html .= form_label($label) . form_textarea($options);
		$html .= "</div>";
		
		return $html;
	}
}