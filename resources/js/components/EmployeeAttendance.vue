<template>
	<div class="d-flex align-items-center">
		<button class="btn btn-danger"  v-if="status" data-toggle="modal" data-target="#remarksBox">Stop Time</button>
		&nbsp;&nbsp;&nbsp;
		<button class="btn btn-success" @click.prevent="startTime" v-if="!status">Start Time</button>
		<div class="modal fade" id="remarksBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Add Remarks (Optional)</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <textarea class="form-control" v-model="remarks" rows="4"></textarea>
		        <button class="btn btn-sm btn-success mt-2"@click.prevent="stopTimer">Stop</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</template>

<script type="text/javascript">
	
	export default {
		data:function() {
			return {
				remarks:'',
				status:false,
			}
		},
		methods: {
			startTime: function() {
				axios.post('/admin/attendances/start-timer')
				.then((response) => {
					this.status = true;
					Vue.$toast.success('You time has started successfully');
				}).catch((error) => {
					console.log(error);
					Vue.$toast.error('Something went wrong . Please try again later');
				})
			},
			stopTimer: function() {
				axios.post('/admin/attendances/stop-timer',{
					remarks: this.remarks,
				})
				.then((response) => {
					this.status = false;
					Vue.$toast.success('Your time has stopped and attendance has been recorded successfully');

					window.location.href = '/admin/attendances';
				}).catch((error) => {
					console.log(error);
					Vue.$toast.error('Something went wrong Please try again later');
				})
			},
		    checkStatus: function() {
		    	axios.get('/admin/attendances/latest-timer').then((response) => {
		    		this.status = response.data.status;
		    	}).catch((error) => {
		    		console.log(error);
		    	})
		    }
		},
		mounted() {
		    this.checkStatus();	   
		},
	}

</script>