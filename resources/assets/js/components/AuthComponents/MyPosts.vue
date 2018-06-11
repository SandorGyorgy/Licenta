<template>
<div>
 
       

       <h3 class="text-center">
    Anunturile mele
      </h3>
     
  <table class="table  table-hover">
    <thead class="text-center">
      <th>Imagine</th>
      <th>Titlu</th>
      <th>Pret</th>
      <th>Camere</th>
      <th class="float-right">Vizualizeaza/Editeaza/Sterge</th>
     

    </thead>
  <tbody>

  <tr  v-for="post in posts" 
  :key="post.id"
  class="text-center"
  >
    
    <td class="p-0">
      <img 
      :src="post.images.image0"
      height="60px"
      width="90px"
      >
      </td>
      <td>{{ post.title }}</td>
      <td>{{ post.price_month }}</td>
      <td>{{ post.room_nr }}</td>
      <td class="float-right"> <button class="btn btn-success ">
         <i class="fa fa-eye"></i>
           </button> 

            <button class="btn btn-info ">
              <i class="fa fa-edit"></i>
            </button> 

            <button 
            class="btn btn-danger"
            @click="trash(post.id)">
               <i class="fa fa-trash"></i>
            </button> 
      </td>


    </tr>



  
  </tbody>
</table>


</div>
</template>
<script>
export default {
  data() {
    return {
      posts: []
    };
  },
  created: function() {
    this.get();
  },

  methods: {
    get() {
      const token = localStorage.getItem("token");
      axios({
        method: "get",
        url: "/api/user/posts",
        headers: { Authorization: `Bearer ${token}` }
      })
        .then(response => {
          const data = response.data.post;
          for (var i in data) {
            const post = {
              id: data[i].id,
              title: data[i].title,
              body: data[i].description,
              price_month: data[i].price_month,
              room_nr: data[i].room_nr,
              images: data[i].images
            };
            this.posts.push(post);
          }
          
        })
        .catch(error => console.log(error));
    },

    trash(id){
        
    }



  }
};
</script>

<style scoped>
.table {
    border-radius: 5px;
    width: 80%;
    margin: 0px auto;
    float: none;
}
</style>