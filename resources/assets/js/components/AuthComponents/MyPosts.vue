<template>

    <div >
        <div v-for="post in posts" :key="post.id">
            <h4> Titlu : {{ post.title }} </h4>
            <h4> Descriere : {{ post.body }} </h4>
            <h4> Pret pe luna : {{ post.price_month }} </h4>
            <h4> Numar Camere : {{ post.room_nr }} </h4>
            <img v-for="image  in post.images" :key="image.index"  :src="image" height="300px" width="300px">
            <hr>
           
        </div> 

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
    }
  }
};
</script>