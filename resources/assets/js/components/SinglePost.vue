<template>
<div>
<div class="row">
<div class="col-md-5">
<img src="#" width="405px" height="300px" class="ml-1 mb-2 mt-2">

<!-- <img 
v-for="(image ,index) in post.images"
:key="index" v-if="image" 
:src="image" 
 width="95px" 
 height="90px" 
 class="ml-1 mb-1"> -->



</div>

<div class="col-md-6  check mt-2 mb-2  text-center">
    <div class="text-center">
      <h1 class="">  test  </h1>
     
    </div>
    <br>
    <div class="row">
        <i class="fa fa-bed fa-2x ml-3" title="Numar camere">: 4</i>
        <h3 class="offset-2">  40  m<sup>2</sup> </h3>
        <h3 class="offset-2"> 100  €</h3>
    </div>

    <br><br>
        
        <h5>Descriere test Descriere test Descriere test Descriere test Descriere test Descriere test Descriere test Descriere test Descriere test Descriere test</h5>
</div>
</div>

<div class="row">

<div class="col-md-5 check ml-3">

        <h1> postat de catre : ...</h1>

</div>

</div>




</div>
</template>
<script>
export default{
data(){
    return{
        post: ''
    };
},

created(){
    this.post = JSON.parse(localStorage.getItem('curentPost')) 
},
destroyed(){
    localStorage.removeItem('curentPost')
}

}


</script>
<style scoped>

.check{
    border: solid 1px black;
}

</style>