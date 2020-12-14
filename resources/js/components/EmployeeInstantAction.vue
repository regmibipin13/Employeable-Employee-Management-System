<template>
</template>

<script>
export default {
    props:['employee'],
    data() {
        return {
            status: this.employee.user.is_enabled,
            mail:{
                title:'',
                subject:'',
                body:'',
            }
        };
    },
    methods: {
        statusChange: function() {
            axios.post('/admin/employees/'+this.employee.id+'/status',{
                status:!this.status,
            }).then((response) => {
                this.status = !this.status
                Vue.$toast.success('User Account status has been changed successfully');
                
            }).catch((error) => {
                Vue.$toast.error('Something went wrong . Please try again later');
            });
        },
        instantMail: function() {
            if(this.mail.title !== "" && this.mail.subject !== "" && this.mail.body !== "") {
                axios.post('/admin/employees/'+this.employee.id+'/instant-mail',this.mail)
                .then((response) => {
                    this.mail.title = "";
                    this.mail.subject = "";
                    this.mail.body = "";
                    Vue.$toast.success('Mail was successfully sent to the employee');
                    window.location.reload();
                }).catch((error) => {
                    console.log(error);
                    Vue.$toast.error('Something went wrong . Please try again later');
                })
            } else {
                Vue.$toast.error('Please fill up all the details');
            }
        }
    }
}
</script>