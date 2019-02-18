<?php 

class Reports_model extends MY_Model {
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

	public function get_balance($student_id) {
		$this->db->order_by('datetime', 'DESC');
		$this->db->limit(1);
		$this->db->where('student_id', $student_id);
		$assessment_group = $this->db->get('assessment_group');

		if ($assessment_group->num_rows()) {
			$row = $assessment_group->row();
			$balance = floatval($row->balance);

			/* Get additional */
			$this->db->where('assessment_group', $row->id);
			$this->db->where('paid', 2);
			$this->db->select_sum('payment');
			$assessment = $this->db->get('assessment');
			$payment = floatval($assessment->row()->payment);
			if (!$payment) $payment = 0;

			/* Total balance */
			$total = $balance + $payment;

			/* Get paid */
			$this->db->where('assessment_group', $row->id);
			$this->db->where('paid', 1);
			$this->db->select_sum('payment');
			$assessment = $this->db->get('assessment');
			$payment = floatval($assessment->row()->payment);
			if (!$payment) $payment = 0;

			$total -= $payment;

			$result = $total;
		}
		else {
			$result = "n/a";
		}

		return $result;
	}
}