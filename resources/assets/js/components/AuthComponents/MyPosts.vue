<template>

    <div>

        <h1>My posts work !</h1>

        <button @click="get">Click</button>

    </div>

</template>

<script>

export default {
    data(){
        return{
     
        }
    },
    methods:{
        get(){
            const userId = localStorage.getItem('userId')
            const token = localStorage.getItem('token');
           axios({
                method: 'get',
                url: '/api/user/posts',
                headers: {'Authorization' : `Bearer ${token}`}
            })
            .then(response => console.log(response))
            .catch(error => console.log(error))
        }
    }



}



</script>