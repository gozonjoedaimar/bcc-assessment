<?php

/**
 * Config file for form validation
 * Reference: http://www.codeigniter.com/user_guide/libraries/form_validation.html
 * (Under section "Creating Sets of Rules")
 */

$config = array(

	// Admin User Login
	'login/index' => array(
		array(
			'field'		=> 'username',
			'label'		=> 'Username',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'password',
			'label'		=> 'Password',
			'rules'		=> 'required',
		),
	),

	// Create User
	'user/create' => array(
		array(
			'field'		=> 'first_name',
			'label'		=> 'First Name',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'last_name',
			'label'		=> 'Last Name',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'username',
			'label'		=> 'Username',
			'rules'		=> 'is_unique[users.username]',				// use email as username if empty
		),
		array(
			'field'		=> 'email',
			'label'		=> 'Email',
			'rules'		=> 'required|valid_email|is_unique[users.email]',
		),
		array(
			'field'		=> 'password',
			'label'		=> 'Password',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'retype_password',
			'label'		=> 'Retype Password',
			'rules'		=> 'required|matches[password]',
		),
	),

	// Reset User Password
	'user/reset_password' => array(
		array(
			'field'		=> 'new_password',
			'label'		=> 'New Password',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'retype_password',
			'label'		=> 'Retype Password',
			'rules'		=> 'required|matches[new_password]',
		),
	),

	// Create Admin User
	'panel/admin_user_create' => array(
		array(
			'field'		=> 'username',
			'label'		=> 'Username',
			'rules'		=> 'required|is_unique[users.username]',
		),
		array(
			'field'		=> 'first_name',
			'label'		=> 'First Name',
			'rules'		=> 'required',
		),
		/* Admin User can have no email
		array(
			'field'		=> 'email',
			'label'		=> 'Email',
			'rules'		=> 'valid_email|is_unique[users.email]',
		),*/
		array(
			'field'		=> 'password',
			'label'		=> 'Password',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'retype_password',
			'label'		=> 'Retype Password',
			'rules'		=> 'required|matches[password]',
		),
	),

	// Reset Admin User Password
	'panel/admin_user_reset_password' => array(
		array(
			'field'		=> 'new_password',
			'label'		=> 'New Password',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'retype_password',
			'label'		=> 'Retype Password',
			'rules'		=> 'required|matches[new_password]',
		),
	),

	// Admin User Update Info
	'panel/account_update_info' => array(
		array(
			'field'		=> 'username',
			'label'		=> 'Username',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'password',
			'label'		=> 'Password',
			'rules'		=> 'required',
		),
	),

	// Admin User Change Password
	'panel/account_change_password' => array(
		array(
			'field'		=> 'new_password',
			'label'		=> 'New Password',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'retype_password',
			'label'		=> 'Retype Password',
			'rules'		=> 'required|matches[new_password]',
		),
	),

	'defaults/set' => array(
		array(
			'field'=>'units',
			'label'=>'Units',
			'rules'=>'required'
		)
	),

	'assessment/save_statement_of_account' => array(
		array(
			'field'=>'payment_stated',
			'label'=>'Amount Due',
			'rules'=>'required|greater_than[0]',
		),
		array(
			'field'=>'student_id',
			'label'=>'Student ID',
			'rules'=>'required'
		),
		array(
			'field'=>'first_name',
			'label'=>'First Name',
			'rules'=>'required'
		),
		array(
			'field'=>'last_name',
			'label'=>'Last Name',
			'rules'=>'required'
		),
		array(
			'field'=>'course_code',
			'label'=>'Course',
			'rules'=>'required'
		),
		array(
			'field'=>'year_level',
			'label'=>'Year',
			'rules'=>'required'
		)
	),

	'assessment/save_assessment_form' => array(
		array(
			'field'=>'total_units',
			'label'=>'No. of Units',
			'rules'=>'required|greater_than[0]'
		),
		array(
			'field'=>'payment_stated',
			'label'=>'Payment Upon Enrollment',
			'rules'=>'required|greater_than[0]'
		),
		array(
			'field'=>'student_id',
			'label'=>'Student ID',
			'rules'=>'required'
		),
		array(
			'field'=>'first_name',
			'label'=>'First Name',
			'rules'=>'required'
		),
		array(
			'field'=>'last_name',
			'label'=>'Last Name',
			'rules'=>'required'
		),
		array(
			'field'=>'course_code',
			'label'=>'Course',
			'rules'=>'required'
		),
		array(
			'field'=>'year_level',
			'label'=>'Year',
			'rules'=>'required'
		)
	),

	'ledger/save_student_information' => array(
		array(
			'field'=>'student_id',
			'label'=>'Student ID',
			'rules'=>'required',
		),
		array(
			'field'=>'first_name',
			'label'=>'First Name',
			'rules'=>'required'
		),
		array(
			'field'=>'last_name',
			'label'=>'Last Name',
			'rules'=>'required'
		)
	),

);