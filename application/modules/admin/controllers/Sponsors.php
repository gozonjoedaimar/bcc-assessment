<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsors extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
	}

	// Frontend User CRUD
	public function index()
	{
		$crud = $this->generate_crud('sponsors');
		$crud->set_subject('List');

		// disable direct create / delete Frontend User
		if ( $this->ion_auth->in_group(array('staff')) ) {
			$crud->unset_add();
			$crud->unset_delete();
		}
		
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_read();
		
		$crud->add_action('View', '', 'admin/sponsors/view', 'fa-book');

		$this->mPageTitle = 'Sponsors';
		$this->render_crud();
	}

	/**
	 *
	 */
	public function view($id)
	{
		$this->mPageTitle = 'Sponsor';

		$this->mViewData['id'] = $id;
		$this->mViewData['list_url'] = site_url('admin/sponsors');

		$this->render('sponsor/index');
	}
}
