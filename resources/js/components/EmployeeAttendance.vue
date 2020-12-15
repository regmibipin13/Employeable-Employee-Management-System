<template>
	<div class="d-flex align-items-center">
		<button class="btn btn-success" @click.prevent="startTime">Start Time</button>
		&nbsp;&nbsp;&nbsp;
		<button class="btn btn-danger"@click.prevent="stopTimer">Stop Time</button>
		&nbsp;&nbsp;&nbsp;
		<h3 class="text-muted p-0 m-0" v-if="status">{{ hours }} hr {{ minutes }} min {{ seconds }} sec</h3>
	</div>
</template>

<script type="text/javascript">
	
	export default {
		data:function() {
			return {
				interval:null,
				hours:0,
				minutes:0,
				seconds:0,
				intervals:{
					seconds:1000,
					minutes:1000 * 60,
					hours:1000 * 60 * 60,
				},
				attendance:'',
				remarks:'',
				status:false,
			}
		},
		methods: {
			startTime: function() {
				axios.post('/admin/attendances/start-timer')
				.then((response) => {
					this.attendance = response.data;
					this.status = true;
					Vue.$toast.success('You time has started successfully');
					this.updateDiffs();
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
					this.attendance = '';
					this.status = false;
					Vue.$toast.success('Your time has stopped successfully');
				}).catch((error) => {
					console.log(error);
					Vue.$toast.error('Something went wrong Please try again later');
				})
			},
			updateDiffs() {
		      	let diff = Math.abs(Date.now() - new Date(this.attendance.created_at.getTime()));
		      	this.hours = Math.floor(diff / this.intervals.hour);
		      	diff -= this.hours * this.intervals.hour;
		      	this.minutes = Math.floor(diff / this.intervals.minute);
		      	diff -= this.minutes * this.intervals.minute;
		      	this.seconds = Math.floor(diff / this.intervals.second);
		    },
		    checkStatus: function() {
		    	axios.get('/admin/attendances/get-latest-data').then((response) => {
		    		this.status = response.data.status;
		    		this.attendance = response.data.attendance;
		    		if(this.status) {
		    			this.startTime();
		    		}
		    	}).catch((error) => {
		    		console.log(error);
		    	})
		    }
		},
		mounted() {
		    this.checkStatus();	
		    console.log(new Date(2018,9,10).getTime());	    
		},
		destroyed() {
		    clearInterval(this.interval);    
		},
	}

</script>