<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\Transaction;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SalaryDueController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_dues_access'), Response::HTTP_FORBIDDEN, '403 HTTP_FORBIDDEN');
    	$employees = Employee::has('transactions')->get();
    	return view('admin.salary-dues.index',['salaryDues'=>$employees]);
    }

    public function show($id)
    {
        abort_if(Gate::denies('salary_dues_show'), Response::HTTP_FORBIDDEN, '403 HTTP_FORBIDDEN');
    	$employee = Employee::find($id);
    	$employee->load(['transactions','user']);
    	return view('admin.salary-dues.show',['salaryDue'=>$employee]);
    }
}
