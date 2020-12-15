<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AttendanceController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		abort_if(Gate::denies('attendance_access'), Response::HTTP_FORBIDDEN, '403 HTTP_FORBIDDEN');
		$attendances = Attendance::all();
		return view('admin.attendances.index', compact('attendances'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		abort_if(Gate::denies('attendance_create'), Response::HTTP_FORBIDDEN, '403 HTTP_FORBIDDEN');
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
		return redirect()->to('/admin/attendances');
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
		abort_if(Gate::denies('attendance_edit'), Response::HTTP_FORBIDDEN, '403 HTTP_FORBIDDEN');
		$employees = Employee::all();
		return view('admin.attendances.edit', compact('attendance', 'employees'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Attendance $attendance) {
		$sanitized = $request->validate([
				'employee_id'  => 'required',
				'date'         => 'required',
				'started_from' => 'required',
				'ended_at'     => 'required',
				'remarks'      => 'nullable',
			]);
		$attendance->update($sanitized);
		return redirect()->to('/admin/attendances');
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

	public function startTimer() {
		abort_if(Gate::denies('attendance_start'), Response::HTTP_FORBIDDEN, '403 HTTP_FORBIDDEN');
		$id = auth()->user()->employee?auth()->user()->employee->id:auth()->id();

		$attendance = Attendance::create([
				'employee_id'  => $id,
				'date'         => \Carbon\Carbon::now()->format('Y-m-d'),
				'started_from' => \Carbon\Carbon::now()->format('H:i:s'),
			]);

		return response()->json($attendance);
	}

	public function stopTimer() {
		// dd('hello');
		abort_if(Gate::denies('attendance_end'), Response::HTTP_FORBIDDEN, '403 HTTP_FORBIDDEN');
		$id         = auth()->user()->employee?auth()->user()->employee->id:auth()->id();
		$attendance = Attendance::where('employee_id', $id)->latest()->first();
		$attendance->update([
				'ended_at' => \Carbon\Carbon::now()->format('H:i:s'),
				'remarks'  => request('remarks')??''
			]);

		return response()->json($attendance);

	}

	public function latestTimer() {
		$employee = auth()->user()->employee?auth()->user()->employee:auth()->user();

		$attendance = $employee->attendances?$employee->attendance->latest()->first():false;

		if ($attendance && $attendance->ended_at == null) {
			return response()->json(['status' => true]);
		} else {
            return response()->json(['status'=>false]);
        }
	}
}
