<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends Admin_Controller {

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
		$this->mPageTitle = 'Reports';

		$this->load->model('assessment_forms_model');

		$this->mViewData['form'] = $this->assessment_forms_model;
		$this->mViewData['form_builder'] = $this->form_builder;

		$this->render('reports/index');
	}
}
