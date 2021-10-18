<template>
        <div>
           {{ user.name }}
        </div>
</template>
<script>
export default {
    data(){
        return{
                user: null,
        }
    },
    methods:{

    },
    mounted(){
         axios.get('/api/user')
        .then((res) => {
            this.user = res.data;
     
        });
    }
}
</script>
<style scoped>

</style>