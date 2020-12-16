<template>
	
</template>


<script type="text/javascript">
	
	export default {

		props:['leave'],

		data() {
			return {
				status: false,
			}
		},

		methods: {
			onChangeEvent: function(data) {
				axios.post('/admin/leaves/toggle-change',{
					is_approved: data.value,
					id:this.leave.id,
				}).then((response) => {
					this.status = data.value;
					var message = this.status ? 'Approved' : 'Pending';
					Vue.$toast.success('The Leave Application has been set to '+message+' successfully');
				}).catch((error) => {
					console.log(error);
					this.status = !this.status;
					Vue.$toast.error('Something went wrong . Please try again later');
				})
			}
		}
	}


</script>