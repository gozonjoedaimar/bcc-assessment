<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| CI Bootstrap 3 Configuration
| -------------------------------------------------------------------------
| This file lets you define default values to be passed into views 
| when calling MY_Controller's render() function. 
| 
| See example and detailed explanation from:
| 	/application/config/ci_bootstrap_example.php
*/

$config['ci_bootstrap'] = array(

	// Site name
	'site_name' => 'Student Assessment System',

	// Default page title prefix
	'page_title_prefix' => '',

	// Default page title
	'page_title' => '',

	// Default meta data
	'meta_data'	=> array(
		'author'	  		=> '',
		'description'	=> '',
		'keywords'		=> '',
		'base_url'     => BASE_URL
	),
	
	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(
			'assets/dist/admin/adminlte.min.js',
			'assets/dist/admin/lib.min.js',
			'assets/dist/admin/app.min.js',
			'assets/local/js/jquery-plugins/bootstrap-growl.min.js',
			// 'assets/local/js/jquery-plugins/jquery.form.min.js',
			'assets/local/js/jquery-plugins/jquery.print-this.min.js',
			'assets/local/lib/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
			'assets/local/js/elements.js',
			'assets/local/js/local.js',
		),
		'foot'	=> array(
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			'assets/dist/admin/adminlte.min.css',
			'assets/dist/admin/lib.min.css',
			'assets/dist/admin/app.min.css',
			'assets/local/lib/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
			'assets/local/css/local.css'
		)
	),

	// Default CSS class for <body> tag
	'body_class' => '',
	
	// Multilingual settings
	'languages' => array(
	),

	// Menu items
	'menu' => array(
		'home' => array(
			'name' => 'Home',
			'url'  => '',
			'icon' => 'fa fa-home',
		),
		/*'user' => array(
			'name'		=> 'Users',
			'url'		=> 'user',
			'icon'		=> 'fa fa-users',
			'children'  => array(
				'List'			=> 'user',
				'Create'		=> 'user/create',
				'User Groups'	=> 'user/group',
			),
		),*/
		'assessment' => array(
			'name' => "Assessment",
			'url'  => 'assessment/create',
			'icon' => 'fa fa-address-book',
		),
		'ledger' => array(
			'name' => "Ledger",
			'url'  => 'ledger',
			'icon' => 'fa fa-book',
		),
		/*'subjects' => array(
			'name'=>'Subjects',
			'url'=>'subjects',
			'icon' => 'fa fa-list-ul'
		),*/
		'courses' => array(
			'name' => 'Courses',
			'url'  => 'courses',
			'icon' => 'fa fa-list-ul'
		),
		'department' => array(
			'name' => 'Departments',
			'url'  => 'department',
			'icon' => 'fa fa-group'
		),
		'scholars' => array(
			'name'  => 'Scholars',
			'url'   => '#',
			'icon'  => 'fa fa-list-ul',
			'children' => array(
				'Sponsors' => 'sponsors',
				'Students' => 'scholars'
			)
		),
		'reports' => array(
			'name' => 'Reports',
			'url'  => 'reports',
			'icon' => 'fa fa-book'
		),
		'defaults' => array(
			'name'  => 'Defaults',
			'url'   => 'defaults/set',
			'icon'  => 'fa fa-gear'
		),
		'panel' => array(
			'name'  => 'Staff Manager',
			'url'   => 'panel',
			'icon'  => 'fa fa-cog',
			'children' => array(
				'List'       => 'panel/admin_user',
				'Create New' => 'panel/admin_user_create',
				'Groups'     => 'panel/admin_user_group',
			)
		),
		'util' => array(
			'name' => 'Utilities',
			'url'  => 'util',
			'icon' => 'fa fa-cogs',
			'children' => array(
				'Database Versions' => 'util/list_db',
			)
		),
		'logout' => array(
			'name' => 'Sign Out',
			'url'  => 'panel/logout',
			'icon' => 'fa fa-sign-out',
		)
	),

	// Login page
	'login_url' => 'admin/login',

	// Restricted pages
	'page_auth' => array(
		'user/create'				=> array('webmaster', 'admin'),
		'user/group'				=> array('webmaster', 'admin'),
		'panel'						=> array('webmaster', 'admin'),
		'panel/admin_user'			=> array('webmaster', 'admin'),
		'panel/admin_user_create'	=> array('webmaster', 'admin'),
		'panel/admin_user_group'	=> array('webmaster', 'admin'),
		'util'						=> array('webmaster', 'admin'),
		'util/list_db'				=> array('webmaster', 'admin'),
		'util/backup_db'			=> array('webmaster', 'admin'),
		'util/restore_db'			=> array('webmaster', 'admin'),
		'util/remove_db'			=> array('webmaster', 'admin'),
		'defaults'			=> array('admin'),
		'ledger'			=> array('admin', 'staff'),
		'assessment/create'			=> array('admin', 'staff'),
		'ledger/create'			=> array('admin', 'staff'),
		'subjects' => array('admin', 'staff'),
		'courses' => array('admin', 'staff'),
		'department' => array('admin'),
		'defaults/set' => array('admin')
	),

	// AdminLTE settings
	'adminlte' => array(
		'body_class' => array(
			'webmaster'	=> 'skin-red',
			'admin'		=> 'skin-yellow',
			/*'manager'	=> 'skin-black',*/
			'staff'		=> 'skin-blue',
		)
	),

	// Useful links to display at bottom of sidemenu
	'useful_links' => array(
		/*array(
			'auth'		=> array('webmaster', 'admin', 'manager', 'staff'),
			'name'		=> 'Frontend Website',
			'url'		=> '',
			'target'	=> '_blank',
			'color'		=> 'text-aqua'
		),
		array(
			'auth'		=> array('webmaster', 'admin'),
			'name'		=> 'API Site',
			'url'		=> 'api',
			'target'	=> '_blank',
			'color'		=> 'text-orange'
		),
		array(
			'auth'		=> array('webmaster', 'admin', 'manager', 'staff'),
			'name'		=> 'Github Repo',
			'url'		=> CI_BOOTSTRAP_REPO,
			'target'	=> '_blank',
			'color'		=> 'text-green'
		),*/
	),

	// Debug tools
	'debug' => array(
		'view_data'	=> FALSE,
		'profiler'	=> FALSE
	),
	// DB export table order
	'db_export' => array(
		'tables' => [
			"courses",
			"department",
			"students",
			"assessment_group",
			"assessment",
			"sponsors",
			"scholars"
		]
	),
);

/*
| -------------------------------------------------------------------------
| Override values from /application/config/config.php
| -------------------------------------------------------------------------
*/
$config['sess_cookie_name'] = 'ci_session_admin';