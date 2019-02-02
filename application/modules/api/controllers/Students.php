<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends REST_Controller
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

		$this->db->select(['first_name', 'middle_name', 'last_name', 'student_id', 'gender', 'course_code', 'year_level']);
		$this->db->like('first_name', $this->get('q'));
		$this->db->or_like('middle_name', $this->get('q'));
		$this->db->or_like('last_name', $this->get('q'));
		$this->db->or_like('student_id', $this->get('q'));

		$response['data'] = $this->db->get('students');

		$this->table->set_template([ 'table_open'=>'<table class="table table-striped table-bordered table-hover">', 'heading_row_start'=>'<tr class="active">' ]);
		$this->table->set_heading(['Fist Name', 'Middle Name', 'Last Name', 'Student ID', 'Gender', 'Course', 'Year Level']);

		$response['html'] = $this->table->generate($response['data']);

		if (!$this->get('q') || !$response['data']->num_rows()) $response['html'] = '<p class="text-center alert alert-warning">No result found</p>';

		$response['data'] = $response['data']->result();

		$this->response($response);
	}
}