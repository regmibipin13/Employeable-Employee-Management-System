<?php

namespace App\Http\Controllers\Admin;
use App\Employee;
use App\Leave;
use App\Holiday;
use App\Attendance;
use Illuminate\Http\Request;
use App\Services\EmployeeService;

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

    public function showProfile($id)
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);
        if($user->hasRole('title','Employee')) {
            $user->employee->update($request->except('photo'));
        }

        if ($request->photo !== null) {
            $user->clearMediaCollection('user_photo');      
            $user->addMedia($request->photo)->toMediaCollection('user_photo');
    
        }

        return redirect()->back()->with('success','Profile Updated successfully');

    }
}
