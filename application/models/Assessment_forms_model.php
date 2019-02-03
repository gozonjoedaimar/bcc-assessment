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
			""  => "Select year level",
			"1" => "First",
			"2" => "Second",
			"3" => "Third",
			"4" => "Forth",
		);

		return $year_level;
	}

	public function get_course_options($full = FALSE)
	{
		$list = array(""=>"Select course");
		$db = $this->CI->db;
		$query = $db->get('courses');

		foreach ($query->result() as $course) {
			$list[$course->code] = $full ? $course->name: $course->code;
		}

		return $list;
	}

	public function get_sponsor_options()
	{
		$list = array(""=>"Select sponsor");
		$db = $this->CI->db;
		$query = $db->get('sponsors');

		foreach ($query->result() as $sponsor) {
			$list[$sponsor->id] = $sponsor->name;
		}

		return $list;
	}

	public function get_department_options($full = FALSE)
	{
		$list = array(""=>"Select department");
		$db = $this->CI->db;
		$query = $db->get('department');

		foreach ($query->result() as $dept) {
			$list[$dept->code] = $full ? $dept->name: $dept->code;
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

	public function hidden($name, $value, $form_builder, $extras = array()) 
	{
		if ( ! $value) $value = $form_builder->get_field_value($name);

		return form_hidden($name, $value, $extras);
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

	/* Checks if student id is already taken */
	public function student_id_exists($id, $db_id = NULL)
	{
		if ($db_id === NULL) {
			return $this->db->limit(1)->get_where('students', array('student_id' => $id))->num_rows() === 1;
		}
		else {
			$query = $this->db->limit(1)->get_where('students', array('student_id' => $id));
			if ($query->num_rows() === 1) {
				$row = $query->row();
				/* Returns false if the id exists and db_id is equal to row id */
				return $row->id != $db_id;
			}
			else {
				return FALSE;
			}
		}
	}

	/* Used for admin confirmation */
	public function admin_auth($username, $password)
	{
		$query = $this->db->limit(1)->get_where('admin_users', array('username'=>$username));

		if ($query->num_rows() === 1) {
			$user = $query->row();

			$id = $user->id;

			if ($this->ion_auth->hash_password_db($id, $password) !== TRUE)
			{
				return FALSE;
			}
			else {
				return TRUE;
			}
		}
		else {
			return FALSE;
		}
	}

	/* Checks if student has account */
	public function get_account($student_id, $year_level, $course_code) 
	{
		return $this->db->limit(1)->get_where('assessment_group', [ 'student_id'=>$student_id, 'year_level'=>$year_level, 'course_code'=>$course_code ]);
	}

	public function input($name, $type, $value, $form_builder, $extras = array())
	{
		$prop = array_merge([
			'name'=>$name,
			'type'=>$type,
			'value'=> $value ? $value: $form_builder->get_field_value($name)
		], $extras);

		return form_input($prop);
	}

	public function bs3_input($label, $name, $type, $value, $form_builder, $extras = array())
	{
		if ( ! isset($extras['class'])) $extras['class'] = "form-control";
		$html  = "<div class=\"form-group\">";
		$html .= form_label($label) . $this->input($name, $type, $value, $form_builder, $extras);
		$html .= "</div>";
		return $html;
	}
}