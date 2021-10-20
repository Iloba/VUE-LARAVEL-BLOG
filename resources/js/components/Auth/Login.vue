<template>
          <div class="container">
                  <div class="card">
                <div class="row justify-content-center p-5">
                        <div class="col-md-6" id="login-image">
                                <img width="70%" class="mx-auto d-block" src="img/register.svg" alt="">
                        </div>
                        <div class="col-md-6  p-3" id="form-box">
                                <div class="mx-auto d-block">
                                        <h2 class="mb-4 text-info">Welcome, Login Below</h2>
                                        <div class="card shadow-sm p-4">
                                                <form  @submit.prevent="signin()">   
                                                        <div class="form-group">  
                                                                <label for="email"><b>Email</b></label>
                                                                <input type="text" v-model="form.email" class="form-control" placeholder="e.g akin@gmail.com">
                                                                <small v-if="errors.email" class="text-danger">{{errors.email[0]}}</small>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                 <label for="password"><b>Pasword</b></label>
                                                                <input type="password" v-model="form.password" class="form-control" placeholder="Enter a valid password">
                                                                <small v-if="errors.password" class="text-danger">{{errors.password[0]}}</small>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <button class="btn btn-info">Login</button>
                                                        </div>
                                                </form>
                                        </div>
                                </div>
                               
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
                        email: '',
                        password: ''
                },
                errors: [],
        }
    },
    methods: {
        signin(){

              axios.post('/api/signin', this.form)
              .then(() => {
                      this.$router.push({name: "Dashboard"});
              }).catch((error) => {
                      this.errors = error.response.data.errors;
              });  

        }
    }
}
</script>
<style scoped>

</style>