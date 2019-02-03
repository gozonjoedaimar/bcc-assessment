<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scholars extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
	}

	/**
	 *
	 */
	public function index()
	{
		$this->mPageTitle = 'Scholars';

		$this->load->model('assessment_forms_model');

		$this->mViewData['form'] = $this->assessment_forms_model;
		$this->mViewData['form_builder'] = $this->form_builder;

		$this->render('scholar/index');
	}
}
