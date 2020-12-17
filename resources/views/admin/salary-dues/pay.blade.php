@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    Salary Payment Process
</h6>
<div class="mT-30">
    <form action="{{ route("admin.salary-dues.pay",$employee->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 form-group">
                <label>Payment Method *</label>
                <select class="form-control" name="payment_method">
                    <option value="cash">Cash</option>
                    <option value="bank">Bank Transfer</option>
                </select>
                @if($errors->has('payment_method'))
                    <em class="invalid-feedback">
                        {{ $errors->first('payment_method') }}
                    </em>
                @endif
            </div>

            <div class="form-group col-md-6">
                <label>Ref Id</label>
                <input type="text" name="refId" placeholder="Enter any reference id if have" class="form-control">
                @if($errors->has('refId'))
                    <em class="invalid-feedback">
                        {{ $errors->first('refId') }}
                    </em>
                @endif
            </div>


            <div class="form-group col-md-6">
                <label>Total Due Amount *</label>
                <input type="text" name="transaction_amount" value="{{ $employee->totalDueSalary() }}" class="form-control">
                @if($errors->has('transaction_amount'))
                    <em class="invalid-feedback">
                        {{ $errors->first('transaction_amount') }}
                    </em>
                @endif
                <p class="help-block">{{ $employee->salary }} is the actual salary and rest is the sum of all dues till today . You can edit the amount and pay as per your wish</p>
            </div>

            <div class="form-group col-md-6">
                <label>Remarks</label>
                <textarea class="form-control" rows="3" name="remarks">Salary Paid</textarea>
            </div>


            <div class="col-md-12 form-group">
                <button class="btn btn-success" type="submit">Confirm and Continue</button>
            </div>
        </div>
    </form>
</div>
@endsection

