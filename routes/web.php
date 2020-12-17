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

		// Leaves Management
		Route::delete('/leaves/destroy','LeaveController@massDestroy')->name('leaves.massDestroy');
		Route::resource('/leaves','LeaveController');
		Route::post('/leaves/toggle-change','LeaveController@toggleChange');

		Route::get('/salary-dues','SalaryDueController@index')->name('salary-dues.index');
		Route::get('/salary-dues/emp-{employee}','SalaryDueController@show')->name('salary-dues.show');
		Route::get('/salary-dues/emp-{employee}/pay','SalaryDueController@showPaymentForm')->name('salary-dues.payment_form');
		Route::post('/salary-dues/emp-{employee}/pay','SalaryDueController@pay')->name('salary-dues.pay');


		// Transactions
		Route::delete('/transactions/destroy','TransactionController@massDestroy')->name('transactions.massDestroy');
		Route::get('/transactions','TransactionController@index')->name('transactions.index');
		Route::delete('/transactions/{transaction}','TransactionController@destroy')->name('transactions.destroy');


		// Holidays
		Route::resource('/holidays','HolidayController');



	});













