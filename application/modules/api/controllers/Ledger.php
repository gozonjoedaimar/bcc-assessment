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

		$response = []; $checks = []; $valid = TRUE; $query = []; $account_total = NULL; $response_data = []; $remaining = NULL;

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
		/* Checks */
		$response['status'] = $valid;
		$response['checks'] = $checks;

		$this->response($response);
	}
}