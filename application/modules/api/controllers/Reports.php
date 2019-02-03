<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	/*  */
	public function index_get()
	{
		// $data = json_decode(file_get_contents('php://input'));

		$response = [];

		$this->db->from('assessment_group');
		$this->db->join('students', 'assessment_group.student_id = students.student_id');
		$this->db->select(['first_name', 'middle_name', 'last_name', 'students.student_id', 'gender', 'assessment_group.course_code', 'assessment_group.year_level']);

		if ($this->get('course_code')) {
			$this->db->where('assessment_group.course_code', $this->get('course_code'));
		}
		if ($this->get('year_level')) {
			$this->db->where('assessment_group.year_level', $this->get('year_level'));
		}
		if ($this->get('batch')) {
			$this->db->where('YEAR(assessment_group.datetime)', $this->get('batch'));
		}

		// $response['query'] = $this->db->get_compiled_select();
		$response['data_raw'] = $this->db->get();
		$response['data'] = $response['data_raw'];

		$this->table->set_template([ 'table_open'=>'<table class="table table-striped table-bordered table-hover">', 'heading_row_start'=>'<tr class="active">' ]);
		$this->table->set_heading(['Fist Name', 'Middle Name', 'Last Name', 'Student ID', 'Gender', 'Course', 'Year Level']);

		$response['html'] = $this->table->generate($response['data']);

		if (!$response['data']->num_rows()) $response['html'] = '<p class="text-center alert alert-warning">No result found</p>';

		$response['data'] = $response['data']->result();

		$this->response($response);
	}
}