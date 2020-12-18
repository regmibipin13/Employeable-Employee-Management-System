@extends('layouts.admin')
@section('content')
<div class="mT-30 row">
	<div class='col-md-3'>
        <div class="layers bd bgc-white p-20">
          <div class="layer w-100 mB-10">
            <h6 class="lh-1">Total Employees</h6>
          </div>
          <div class="layer w-100">
            <div class="peers ai-sb fxw-nw">
              <div class="peer peer-greed">
                <span id="sparklinedash"></span>
              </div>
              <div class="peer">
                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">100</span>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class='col-md-3'>
        <div class="layers bd bgc-white p-20">
          <div class="layer w-100 mB-10">
            <h6 class="lh-1">Total Attendance Today</h6>
          </div>
          <div class="layer w-100">
            <div class="peers ai-sb fxw-nw">
              <div class="peer peer-greed">
                <span id="sparklinedash2"></span>
              </div>
              <div class="peer">
                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">90%</span>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class='col-md-3'>
        <div class="layers bd bgc-white p-20">
          <div class="layer w-100 mB-10">
            <h6 class="lh-1">On Leave Employees Today</h6>
          </div>
          <div class="layer w-100">
            <div class="peers ai-sb fxw-nw">
              <div class="peer peer-greed">
                <span id="sparklinedash3"></span>
              </div>
              <div class="peer">
                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">~12%</span>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class='col-md-3'>
        <div class="layers bd bgc-white p-20">
          <div class="layer w-100 mB-10">
            <h6 class="lh-1">Total Holidays</h6>
          </div>
          <div class="layer w-100">
            <div class="peers ai-sb fxw-nw">
              <div class="peer peer-greed">
                <span id="sparklinedash4"></span>
              </div>
              <div class="peer">
                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">33%</span>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<div class="mT-30 row">
	<div class="col-md-6">
		<h4>Today's Attendance</h4>
		<a href="" class="btn btn-sm btn-primary mb-2">View All</a>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Employee ID</th>
					<th>Start Time</th>
					<th>End Time</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>EMP-12</td>
					<td>12 30 AM</td>
					<td>still working</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-6">
		<h4>Recent Leave Requests</h4>
		<a href="" class="btn btn-sm btn-primary mb-2">View All</a>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Employee ID</th>
					<th>Date</th>
					<th>Reason</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>EMP-12</td>
					<td>2020-12-20</td>
					<td>Sick Leave</td>
					<td>
						<a href="" class="btn btn-sm btn-info">View</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection
@section('scripts')
@parent

@endsection
