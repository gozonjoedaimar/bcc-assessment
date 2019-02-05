<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsors extends REST_Controller
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

		$this->db->select(['name']);

		$response['data'] = $this->db->get('sponsors');

		$this->table->set_template([ 'table_open'=>'<table class="table table-striped table-bordered table-hover">', 'heading_row_start'=>'<tr class="active">' ]);
		$this->table->set_heading(['Name']);

		$response['html'] = $this->table->generate($response['data']);

		if (!$response['data']->num_rows()) $response['html'] = '<p class="text-center alert alert-warning">No result found</p>';

		$response['data'] = $response['data']->result();

		$this->response($response);
	}
}