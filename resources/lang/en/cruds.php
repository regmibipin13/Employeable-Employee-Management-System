<?php

return [
	'attendance'      => [
		'title'          => 'Attendance',
		'title_singular' => 'Attendance',
		'fields'         => [
			'id'            => 'ID',
			'id_helper'     => 'id_helper',
			'employee_id'   => 'Employee',
			'date'          => 'Date',
			'started_from'  => 'Started From',
			'ended_at'      => 'Ended At',
			'remarks'       => 'Remarks',
		],
	],
	'employee'                 => [
		'title'                   => 'Employees',
		'title_singular'          => 'Employees',
		'fields'                  => [
			'id'                     => 'ID',
			'id_helper'              => '',
			'name'                   => 'Name',
			'email'                  => 'Email',
			'phone'                  => 'Phone',
			'address'                => 'Address',
			'designation'            => 'Designation',
			'department'             => 'Department',
			'photo'                  => 'Display Picture',
			'salary_type'            => 'Salary / Wage Type',
			'salary'                 => 'Salary per type',
			'academic_qualification' => 'Academic Qualifications',
			'bio'                    => 'Bio',
			'started_from'           => 'Started Working From'
		]
	],
	'designation'     => [
		'title'          => 'Designations',
		'title_singular' => 'Designations',
		'fields'         => [
			'id'            => 'ID',
			'id_helper'     => '',
			'name_helper'   => '',
			'name'          => 'Name',
		]
	],
	'department'      => [
		'title'          => 'Departments',
		'title_singular' => 'Departments',
		'fields'         => [
			'id'            => 'ID',
			'id_helper'     => '',
			'name'          => 'Name',
			'name_helper'   => ''
		]
	],
	'permission'          => [
		'title'              => 'Permissions',
		'title_singular'     => 'Permission',
		'fields'             => [
			'id'                => 'ID',
			'id_helper'         => '',
			'title'             => 'Title',
			'title_helper'      => '',
			'created_at'        => 'Created at',
			'created_at_helper' => '',
			'updated_at'        => 'Updated at',
			'updated_at_helper' => '',
			'deleted_at'        => 'Deleted at',
			'deleted_at_helper' => '',
		],
	],
	'role'                 => [
		'title'               => 'Roles',
		'title_singular'      => 'Role',
		'fields'              => [
			'id'                 => 'ID',
			'id_helper'          => '',
			'title'              => 'Title',
			'title_helper'       => '',
			'permissions'        => 'Permissions',
			'permissions_helper' => '',
			'created_at'         => 'Created at',
			'created_at_helper'  => '',
			'updated_at'         => 'Updated at',
			'updated_at_helper'  => '',
			'deleted_at'         => 'Deleted at',
			'deleted_at_helper'  => '',
		],
	],
	'userManagement'  => [
		'title'          => 'Admin Management',
		'title_singular' => 'Admin Management',
	],
	'user'                       => [
		'title'                     => 'Users',
		'title_singular'            => 'User',
		'fields'                    => [
			'id'                       => 'ID',
			'id_helper'                => '',
			'name'                     => 'Name',
			'name_helper'              => '',
			'email'                    => 'Email',
			'email_helper'             => '',
			'email_verified_at'        => 'Email verified at',
			'email_verified_at_helper' => '',
			'password'                 => 'Password',
			'password_helper'          => '',
			'roles'                    => 'Roles',
			'roles_helper'             => '',
			'remember_token'           => 'Remember Token',
			'remember_token_helper'    => '',
			'created_at'               => 'Created at',
			'created_at_helper'        => '',
			'updated_at'               => 'Updated at',
			'updated_at_helper'        => '',
			'deleted_at'               => 'Deleted at',
			'deleted_at_helper'        => '',
		],
	],
];
