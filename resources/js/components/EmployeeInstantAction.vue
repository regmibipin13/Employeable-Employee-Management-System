<template>
</template>

<script>
export default {
    props:['employee'],
    data() {
        return {
            status: this.employee.user.is_enabled,
        };
    },
    methods: {
        statusChange: function() {
            axios.post('/admin/employees/'+this.employee.id+'/status',{
                status:!this.status,
            }).then((response) => {
                this.status = !this.status
                this.flashMessage.success({
                    title: 'Operation Success',
                    message: 'User Account Status Changed Successfully'
                });
            }).catch((error) => {
                this.flashMessage.error({
                    title: 'Error !',
                    message: 'Something went wrong , please try again'
                });
            });
        }
    }
}
</script>