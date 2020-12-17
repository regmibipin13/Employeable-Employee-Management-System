@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    Holidays
</h6>

<holidays inline-template>
	<div class="mT-30">
		@can('holidays_create')
		<div style="margin-bottom: 10px;" class="row">
            <form class="d-flex w-100 align-items-center" @submit.prevent="addHoliday" method="POST">
            	@csrf
            	<div class="col-md-4 form-group">
	            	<label>Date</label>
	            	<input type="date" v-model="form.date" class="form-control" placeholder="Ener the Date" required>
	            </div>
	            <div class="form-group col-md-4">
	            	<label>Reason</label>
	            	<input type="text" v-model="form.reason" placeholder="Enter the Reason for Holiday" class="form-control" required>
	            </div>
	            <div class="form-group col-md-2">
	            	<br />
	            	<button type="submit" class="btn btn-success">Add</button>
	            </div>
            </form>
        </div>
		@endcan

		<div class="calender-box row mb-5 d-flex justify-content-between" v-cloak>
			<div class="col-md-2 single-box-holiday text-center pt-2 pb-2 mb-2 mr-1" v-for="(holiday,index) in holidays">
				@{{ holiday.date }} &nbsp; <i class="fas fa-gift" style="color: green;" @click="showDetails(holiday.reason)"></i> &nbsp; <i class="fas fa-trash-alt" style="color:red; cursor: pointer;" @click="deleteHoliday(index)"></i>
			</div>
			<modal name="holiday" :height="'auto'">
				<p class="p-5">@{{ selected == '' ? 'not mentioned' : selected }}</p>
			</modal>
		</div>
		<div class="col-md-12">
			<infinite-loading @infinite="loadHolidays" spinner="waveDots">
			  	<div slot="no-more"></div>
			  	<div slot="no-results"></div>
			</infinite-loading>
		</div>
	</div>
</holidays>

@endsection