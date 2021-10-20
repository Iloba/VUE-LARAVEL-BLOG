<template>
 <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card p-3">
                <h2 class="text-info mb-3">Welcome, Register</h2>
                <form @submit.prevent="signupuser()">
                            
                <div class="form-group">
                  
                    <label for="name"><b>Name</b></label>
                    <input type="text" v-model="form.name" class="form-control" placeholder="e.g Emeka, Ahmad, Akin">
                    <small v-if="errors.name" class="text-danger">{{errors.name[0]}}</small>
                </div>
                <div class="form-group">
                    <label for="name"><b>Email</b></label>
                    <input type="text" v-model="form.email" class="form-control" placeholder="e.g akin@gmail.com">
                      <small v-if="errors.email" class="text-danger">{{errors.email[0]}}</small>
                </div>
                <div class="form-group">
                    <label for="name"><b>Phone</b></label>
                    <input type="number" v-model="form.phone" class="form-control" placeholder="e.g 08054421799">
                      <small v-if="errors.phone" class="text-danger">{{errors.phone[0]}}</small>
                </div>
                <div class="form-group">
                    <label for="name"><b>Pasword</b></label>
                    <input type="password" v-model="form.password" class="form-control" placeholder="Enter a valid password">
                      <small v-if="errors.password" class="text-danger">{{errors.password[0]}}</small>
                </div>
                <div class="form-group ">
                    <label for="name"><b>Confirm Pasword</b></label>
                    <input type="password" v-model="form.password_confirmation" class="form-control " placeholder="Confirm password">
                     <small v-if="errors.password_confirmation" class="text-danger">{{errors.password_confirmation[0]}}</small>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">Register</button>
                </div>

                </form>
            </div>
        </div>
    </div>
 </div>

</template>
<script>
export default {
    data(){
        return{
            form:{
                name: '',
                email: '',
                phone: '',
                password: '',
                password_confirmation: ''
            },
            errors: [],
        }
    },
    methods:{
        signupuser(){
            axios.post('/api/register', this.form)
            .then(res => {
                alert(res.data);
                 this.$router.push({name: 'Login'});
                this.form = '';
            }).catch(error => {
                this.errors = error.response.data.errors;
            });
        }
    }
}
</script>
<style scoped>

</style>