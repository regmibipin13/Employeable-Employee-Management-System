<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Leave;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('leave_access'),Response::HTTP_FORBIDDEN, '403 HTTP_FORBIDDEN');
        $leaves = Leave::all();
        return view('admin.leaves.index',compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('leave_create'),Response::HTTP_FORBIDDEN, '403 HTTP_FORBIDDEN');
        return view('admin.leaves.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['employee_id'=>auth()->user()->employee->id]);
        $sanitized = $request->validate([
            'reason' => 'required',
            'date' => 'required',
            'description' => 'required',
            'employee_id' => 'required',
        ]);

        Leave::create($sanitized);
        return redirect()->to('/admin/leaves');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        abort_if(Gate::denies('leave_edit'),Response::HTTP_FORBIDDEN, '403 HTTP_FORBIDDEN');
        return view('admin.leaves.edit',compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Leave $leave)
    {
        $sanitized = $request->validate([
            'reason' => 'required',
            'date' => 'required',
            'description' => 'required',
            'employee_id' => 'required',
        ]);

        $leave->update($sanitized);
        return redirect()->to('/admin/leaves');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        $leave->delete();
        return redirect()->back();
    }

    public function massDestroy(Request $request)
    {
        Leave::whereIn('id',request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
