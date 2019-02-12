<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scholars extends REST_Controller
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

		$this->db->join('students', 'students.student_id = scholars.student_id');
		$this->db->select(['students.student_id','students.last_name','students.first_name','students.middle_name','students.course_code']);

		if ($this->get('q'))
			$this->db->where('YEAR(datetime)=', $this->get('q'));
		if ($this->get('batch'))
			$this->db->where('YEAR(datetime)=', $this->get('batch'));
		if ($this->get('sponsor'))
			$this->db->where('sponsor', $this->get('sponsor'));

		$response['data'] = $this->db->get('scholars');

		$this->table->set_template([ 'table_open'=>'<table class="table table-striped table-bordered table-hover">', 'heading_row_start'=>'<tr class="active">' ]);
		$this->table->set_heading(['Student ID', 'Last Name', 'First Name', 'Middle Name', 'Course']);

		$response['html'] = $this->table->generate($response['data']);

		if (!$response['data']->num_rows()) $response['html'] = '<p class="text-center alert alert-warning">No result found</p>';

		$response['data'] = $response['data']->result();

		$this->response($response);
	}
}