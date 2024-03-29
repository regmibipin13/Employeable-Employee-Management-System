@extends('layouts.admin')
@section('content')

@can('dashboard_access')
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
                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">{{ $totalEmployees }}</span>
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
                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">{{ $totalAttendanceToday }}%</span>
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
                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">{{ $totalLeavesToday }}</span>
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
                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">{{ $totalHolidays }}</span>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<div class="mT-30 row">
	<div class="col-md-6">
		<h4>Today's Attendance</h4>
		<a href="{{ route('admin.attendances.index') }}" class="btn btn-sm btn-primary mb-2">View All</a>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Employee ID</th>
					<th>Start Time</th>
					<th>End Time</th>
				</tr>
			</thead>
			<tbody>
        @foreach($attendancesToday as $attendance)
				<tr>
					<td>EMP-{{ $attendance->employee_id }}</td>
					<td>{{ $attendance->started_from }}</td>
					<td>{{ $attendance->ended_at ?? '---' }}</td>
				</tr>
        @endforeach
			</tbody>
		</table>
	</div>
	<div class="col-md-6">
		<h4>Recent Leave Requests</h4>
		<a href="{{ route('admin.leaves.index') }}" class="btn btn-sm btn-primary mb-2">View All</a>
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
        @foreach($leavesToday as $leave)
				<tr>
					<td>EMP-{{ $leave->employee_id }}</td>
					<td>{{ $leave->date }}</td>
					<td>{{ $leave->reason }}</td>
					<td>
						<a href="{{ route('admin.leaves.show',$leave->id) }}" class="btn btn-sm btn-info">View</a>
					</td>
				</tr>
        @endforeach
			</tbody>
		</table>
	</div>
</div>
@else

<div class="mT-30 row">
  <div class="col-md-12">
    <h5>Welcome to the Dashboard</h5>
  </div>
</div>

@endcan

@endsection
@section('scripts')
@parent

@endsection
