<?php 

class Ledger_model extends MY_Model {
	public function get_account($data) {
		$query = $this->db->limit(1)->get_where('assessment_group', $data);
		if ($query->num_rows() === 1) {
			$row = $query->row();
			return $row;
		}
		else {
			return FALSE;
		}
	}

	public function statement_of_accounts($account_id) {
		return $this->db->get_where('assessment', ['assessment_group' => $account_id])->result_array();
	}
}