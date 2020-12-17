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
        // dd(Employee::find(1)->totalDueSalary());
        abort_if(Gate::denies('salary_dues_access'), Response::HTTP_FORBIDDEN, '403 HTTP_FORBIDDEN');
    	$employees = Employee::all();
    	return view('admin.salary-dues.index',['salaryDues'=>$employees]);
    }

    public function show($id)
    {
        abort_if(Gate::denies('salary_dues_show'), Response::HTTP_FORBIDDEN, '403 HTTP_FORBIDDEN');
    	$employee = Employee::find($id);
    	$employee->load(['transactions','user']);
    	return view('admin.salary-dues.show',['salaryDue'=>$employee]);
    }

    public function showPaymentForm($id)
    {
        $employee = Employee::find($id);
        return view('admin.salary-dues.pay',compact('employee'));
    }


    public function pay(Request $request,$id)
    {
        $employee = Employee::find($id);
        $request->merge(['transaction_date'=>\Carbon\Carbon::now()->toDateTimeString()]);
        $transaction = new Transaction;
        $transaction->transaction_date = $request->transaction_date;
        $transaction->transaction_amount = $request->transaction_amount;
        $transaction->refId = $request->refId;
        $transaction->payment_method = $request->payment_method;
        $transaction->remarks = $request->remarks;
        $transaction->payeable()->associate($employee);
        $transaction->save();

        return redirect()->to('/admin/salary-dues')->with('success','Salary Paid Successfully');
    }
}
