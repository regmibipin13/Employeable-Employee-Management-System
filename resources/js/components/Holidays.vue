<template>
	
</template>

<script type="text/javascript">
	
	export default {
		data() {
			return {
				holidays:[],
				page:1,
				form:{
					date:'',
					reason:'',
				},
				selected:'not mentioned',
			};
		},
		methods:{
			loadHolidays: function($state) {
				axios.get('/admin/holidays',{
					params: {
			        	page: this.page,
			        },
				}).then(({data}) => {
					if(data.data.length > 0) {
						this.page +=1;
						this.holidays.push(...data.data);
						$state.loaded();
					} else {
						$state.complete();
					}
					
				}).catch((error) => {
					console.log(error);
				})
			},
			addHoliday: function() {
				axios.post('/admin/holidays',this.form).then((response) => {
					this.holidays.push(response.data);
					Vue.$toast.success('New Holiday Added');
					this.form.date = '';
					this.form.reason = '';
				}).catch((error) => {
					console.log(error);
					Vue.$toast.error('Something went wrong . Please try again later');
				})
			},
			deleteHoliday(index) {
				axios.delete('/admin/holidays/'+this.holidays[index].id).then((response) => {
					this.holidays.splice(index, 1);
					Vue.$toast.success('Holiday removed successfully');
				}).catch((error) => {
					console.log(error);
					Vue.$toast.error('Something went wrong . Please try again later');
				})
			},
			showDetails: function(reason) {
				this.selected = reason == '' ? 'not mentioned': reason;
				this.$modal.show('holiday');
			}
		},
	}

</script>