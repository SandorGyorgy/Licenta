<template>

    <div >
        <div v-for="post in posts" :key="post.id">
            <h1>My posts work !</h1>
            <h4> Titlu : {{ post.title }} </h4>
            <h4> Descriere : {{ post.body }} </h4>
            <h4> Pret pe luna : {{ post.price_month }} </h4>
            <h4> Numar Camere : {{ post.room_nr }} </h4>
            <h4> Judet : {{ post.county }} </h4>
            <h4> Oras : {{ post.city }} </h4>
           
        </div> 

    </div>

</template>

<script>

export default {
    data(){
        return{
            posts: [],
         
        }
    },
    mounted: function(){
        this.get()
    },

    methods:{
        get(){
            const token = localStorage.getItem('token')
           axios({
                method: 'get',
                url: '/api/user/posts',
                headers: {'Authorization' : `Bearer ${token}`}
            })
            .then(response => {
              const  data = response.data.post
                for(var i in data)
               { 
                   const post = {
                    id: data[i].id ,
                    title: data[i].title,
                    body: data[i].description,
                    price_month: data[i].price_month,
                    room_nr : data[i].room_nr ,
                    county: data[i].location.county,
                    city: data[i].location.city
                }
                this.posts.push(post);
                
                }

                
              
             
                
                // this.room_nr : data[i]room_nr
            })
            .catch(error => console.log(error))
        },
    }



}



</script>