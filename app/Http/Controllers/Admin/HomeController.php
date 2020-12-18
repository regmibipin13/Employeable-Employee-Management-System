<?php

namespace App\Http\Controllers\Admin;
use App\Employee;
use App\Leave;
use App\Holiday;
use App\Attendance;

class HomeController
{
    public function index()
    {
    	$totalEmployees = Employee::count();
    	$attendancesToday = Attendance::where('date',\Carbon\Carbon::today()->toDateString())->get();
    	$leavesToday = Leave::where('date',\Carbon\Carbon::now()->toDateString())->get();
    	$totalHolidays = Holiday::count();
        return view('home',[
        	'totalEmployees' => $totalEmployees,
        	'attendancesToday' => $attendancesToday,
        	'totalAttendanceToday' => $attendancesToday->count(),
        	'leavesToday' => $leavesToday,
        	'totalLeavesToday' => $leavesToday->count(),
        	'totalHolidays' => $totalHolidays,
        ]);
    }
}
