<template>
        <div class="container">
            <h1>Welcome to your Dashbord</h1>
            Name:  {{ user.name }}
            Email: {{ user.email }}
            <button @click.prevent="logout" class="btn btn-info">Logout</button>
        </div>
</template>
<script>
export default {
    data(){
        return{
                user: null,
        }
    },
     mounted(){
         axios.get('/api/user')
        .then((res) => {
            this.user = res.data;
     
        });
    },
    methods:{
        logout(){
            axios.post('/api/logout')
            .then(()=>{
                //if successful, redirect user to login page(component)
                this.$router.push({name: 'Login'})
            });
        }
    }
   
}
</script>
<style scoped>

</style>