<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$attendances = Attendance::all();
		return view('admin.attendances.index', compact('attendances'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$employees = Employee::all();
		return view('admin.attendances.create', compact('employees'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$sanitized = $request->validate([
				'employee_id'  => 'required',
				'date'         => 'required',
				'started_from' => 'required',
				'ended_at'     => 'required',
				'remarks'      => 'nullable',
			]);
		Attendance::create($sanitized);
		return redirect()->to('/attendances');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Attendance $attendance) {
		$employees = Employee::all();
		return view('admin.attendances.edit', compact('attendances'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Employee $employee) {
		$sanitized = $request->validate([
				'employee_id'  => 'required',
				'date'         => 'required',
				'started_from' => 'required',
				'ended_at'     => 'required',
				'remarks'      => 'nullable',
			]);
		$attendance->update($sanitized);
		return redirect()->to('/attendances');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Attendance $attendance) {
		$attendance->delete();
		return redirect()->back();
	}

	public function massDestroy(Request $request, Attendance $attendance) {
		Attendance::whereIn('id', request('ids'))->delete();
		return response(null, Response::HTTP_NO_CONTENT);
	}
}
