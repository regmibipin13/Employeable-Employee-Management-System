<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);
Route::get('/employees/password/reset/{token}', 'Auth\ResetPasswordController@showEmployeeResetForm');
Route::post('/employees/password/reset', 'Auth\ResetPasswordController@resetEmployeePassword')->name('employees.resetPassword');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
		Route::get('/', 'HomeController@index')->name('home');
		// Permissions
		Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
		Route::resource('permissions', 'PermissionsController');

		// Roles
		Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
		Route::resource('roles', 'RolesController');

		// Users
		Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
		Route::resource('users', 'UsersController');

		// Designation
		Route::delete('designations/destroy', 'DesignationController@massDestroy')->name('designations.massDestroy');
		Route::resource('/designations', 'DesignationController');

		// Departments
		Route::delete('departments/destroy', 'DepartmentsController@massDestroy')->name('departments.massDestroy');
		Route::resource('/departments', 'DepartmentsController');

		// Employees
		Route::delete('employees/destroy', 'EmployeeController@massDestroy')->name('employees.massDestroy');
		Route::resource('/employees', 'EmployeeController');
		Route::post('/employees/{employee}/instant-mail', 'EmployeeController@instantMail')->name('employees.instant_mail');
		Route::post('/employees/{employees}/status', 'EmployeeController@changeStatus')->name('employees.status');

		// Attendances
		Route::get('/attendances/latest-timer', 'AttendanceController@latestTimer')->name('attendances.latest-timer');
		Route::delete('/attendances/destroy', 'AttendanceController@massDestroy')->name('attendances.massDestroy');
		Route::resource('/attendances', 'AttendanceController');
		Route::post('/attendances/start-timer', 'AttendanceController@startTimer');
		Route::post('/attendances/stop-timer', 'AttendanceController@stopTimer');

	});
