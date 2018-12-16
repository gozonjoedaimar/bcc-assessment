<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Defaults extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
	}

	// Frontend User CRUD
	public function labels()
	{
		$crud = $this->generate_crud('price_defaults');
		// $crud->columns('name','label', 'value');
		$crud->set_subject('Labels');
		$crud->required_fields('label', 'value', 'name');

		$this->mPageTitle = 'Manage default labels';
		$this->render_crud();
	}

	// 
	public function index() 
	{
		return redirect('admin/defaults/set');
	}

	// Set assessment price defaults
	public function set()
	{
		$form = $this->form_builder->create_form();

		if ($form->validate())
		{
			$post = $this->input->post();

			$all_saved = TRUE;

			/* Loop through table */
			foreach ($post as $name => $value) {
				$this->db->reset_query();
				$this->db->set('value', $value);
				$this->db->where('name', $name);
				$saved = $this->db->update('price_defaults');
				if (!$saved) $all_saved = FALSE;
			}

			if ($all_saved) {
				$this->system_message->set_success('All defaults saved!');
			}
			else {
				$this->system_message->set_error('Some input were not saved.');
			}

			refresh();
		}

		// Get defaults labels
		$query = $this->db->get('price_defaults');
		$this->mViewData['default_labels'] = $query->result_array();

		/* Set Page Title */
		$this->mPageTitle = 'Defaults';

		$this->mViewData['form'] = $form;
		$this->render('default/prices');
	}
}
