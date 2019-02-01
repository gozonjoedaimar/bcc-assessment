<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Swagger extends MY_Controller {
	
	// Output Swagger JSON
	public function index()
	{
		// folders which include files with Swagger annotations
		$module_dir = APPPATH.'modules/'.$this->mModule;
		$paths = array(
			$module_dir.'/swagger',
			$module_dir.'/controllers',
		);
		$swagger = \Swagger\scan($paths);

		// output JSON
		header('Content-Type: application/json');		
		echo $swagger;
	}

	/* Debugging */
	public function ion_auth_test() 
	{
		$this->load->model('assessment_forms_model', 'assessment_forms');
		$data = json_decode(file_get_contents('php://input'));

		header('Content-Type: application/json');
		echo json_encode([
			"post"=>$data,
			"confirm"=>$this->assessment_forms->admin_auth($data->username, $data->password),
			"student_id_exists"=>$this->assessment_forms->student_id_exists($data->student_id)
		]);
	}
}
