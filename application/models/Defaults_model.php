<?php 

class Defaults_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$defaults = $this->db->get('price_defaults');

		foreach ($defaults->result() as $default) {
			$this->_defaults[$default->name] = $default->value;
		}
	}

	private $_defaults;

	public function get($name)
	{
		return isset($this->_defaults[$name]) ? $this->_defaults[$name] : "";
	}

	public function all()
	{
		return $this->_defaults;
	}
}