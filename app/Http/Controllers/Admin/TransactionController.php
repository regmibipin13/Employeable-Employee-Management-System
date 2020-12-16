<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    public function index()
    {
    	abort_if(Gate::denies('transactions_access'), Response::HTTP_FORBIDDEN, '403 HTTP_FORBIDDEN');
    	$transactions = Transaction::all();
    	return view('admin.transactions.index',compact('transactions'));
    }

    public function destroy(Transaction $transaction)
    {
    	$transaction->delete();
    	return redirect()->back();
    }

    public function massDestroy()
    {
    	Transaction::whereIn('id',request('ids'))->delete();
    	return response(null, Response::HTTP_NO_CONTENT);
    }
}
