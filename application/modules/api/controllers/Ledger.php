<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ledger extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ledger_model', 'ledger');
	}

	/*  */
	public function index_get()
	{
		// $data = json_decode(file_get_contents('php://input'));

		$important = ['student_id', 'course_code', 'year_level'];

		$response = []; $checks = []; $valid = TRUE; $query = []; $account_total = NULL; $response_data = []; $remaining = NULL; $enrolled = NULL;

		/* Check important fields */
		foreach ($important as $field) {
			$checks[$field] = ! empty($this->get($field));
			if ( ! $checks[$field]) $valid = FALSE;
		}

		if ($valid) {
			$query = [
				'student_id'  => $this->get('student_id'),
				'course_code' => $this->get('course_code'),
				'year_level'  => $this->get('year_level')
			];

			$account = $this->ledger->get_account($query);

			if ( ! $account) {
				return $this->response([
					'status'=>FALSE,
					'error' => "No account found"
				]);
			}

			$account_total = $account->balance;
			$enrolled = $account->datetime;
			$remaining = intval($account_total);

			$response['account'] = $account->id;

			$response_data = $this->ledger->statement_of_accounts($account->id);

			foreach ($response_data as $key => $statement) {
				if (intval($statement['paid']) === 1) {
					$remaining -= intval($statement['payment']);
				}
			}
		}

		/* Prepare response */
		$response['account_total'] = $account_total;
		$response['data'] = $response_data;
		$response['remaining'] = $remaining;
		$response['enrolled'] = $enrolled;
		/* Checks */
		$response['status'] = $valid;
		$response['checks'] = $checks;

		$this->response($response);
	}

	public function index_post() {
		$query = $this->db->limit(1)->get_where('assessment', [ 'id'=>$this->post('id') ]);
		if ($query->num_rows() === 1) {

			$query = $this->db->limit(1)->get_where('assessment', ['official_receipt'=>$this->post('receipt')]);

			if ($query->num_rows() === 1) {
				return $this->response([ 'status'=> FALSE, 'message'=>'Receipt already added' ]);
			}

			$this->db->set('paid', 1);
			$this->db->set('official_receipt', $this->post('receipt'));
			$this->db->where('id', $this->post('id'));
			$saved = $this->db->update('assessment');

			if ($saved) {
				$this->response([ 'status'=> TRUE, 'message'=>'Account updated' ]);
			}
			else {
				$this->response([ 'status'=> FALSE, 'message'=>'There was an error on your request' ]);
			}
		}
		else {
			$this->response([ 'status'=> FALSE, 'message'=>'Account does not exist' ]);
		}
	}
}