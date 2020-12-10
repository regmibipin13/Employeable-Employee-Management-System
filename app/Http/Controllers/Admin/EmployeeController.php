<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Designation;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employees\StoreRequest;
use App\Http\Requests\Employees\UpdateRequest;
use App\Services\EmployeeService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		abort_if(Gate::denies('employee_access'), Response::HTTP_FORBIDDEN, '403 FORBIDDEN');
		$employees = Employee::all();
		return view('admin.employees.index', compact('employees'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		abort_if(Gate::denies('employee_create'), Response::HTTP_FORBIDDEN, '403 FORBIDDEN');
		$designations = Designation::all();
		$departments  = Department::all();
		return view('admin.employees.create', compact('designations', 'departments'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreRequest $request) {
		$employeeService = new EmployeeService;
		$user            = $employeeService->createUserAccount($request);
		$request->merge(['user_id' => $user->id]);
		$employee = Employee::create($request->all());
		return redirect()->to('/admin/employees');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Employee $employee) {
		abort_if(Gate::denies('employee_show'), Response::HTTP_FORBIDDEN, '403 FORBIDDEN');
		return view('admin.employees.show', compact('employee'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Employee $employee) {
		abort_if(Gate::denies('employee_edit'), Response::HTTP_FORBIDDEN, '403 FORBIDDEN');
		$designations = Designation::all();
		$departments  = Department::all();
		dd($employee->started_from);
		return view('admin.employees.edit', compact('designations', 'departments', 'employee'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateRequest $request, Employee $employee) {
		$employeeService = new EmployeeService;

		$employeeService->updateUserAccount($request, $employee);

		$request->merge(['user_id', $employee->user_id]);
		$employee->update($request->all());

		return redirect()->to('/admin/employees');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Employee $employee) {
		abort_if(Gate::denies('employee_delete'), Response::HTTP_FORBIDDEN, '403 FORBIDDEN');
		User::find($employee->user_id)->delete();
		$employee->delete();
		return redirect()->back();
	}

	public function massDestroy(Request $request, Employee $employee) {
		Employee::whereIn('id', request('ids'))->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
