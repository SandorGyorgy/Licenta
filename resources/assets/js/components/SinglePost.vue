<template>
<div>
<div class="row">
<div class="col-md-5">

    <div  class="mb-2 mt-2 ml-1" id="displayImage">
            <img :src="currentImage" height="100%" width="100%" class="rounded">
            <i @click="prev" class="fa fa-chevron-left fa-3x arrowLeft" align="right"></i>
            <i @click="next" class="fa fa-chevron-right fa-3x arrowRight"></i>
             
    </div>


    <img 
    v-for="(image ,index) in images"
    :key="index" v-if="image" 
    :src="image" 
    :class="{ active : image == currentImage , inactive : image != currentImage }"
    @click="change(index)"
    width="98px" 
    height="90px" 
    class="ml-1 mb-2">



</div>

<div class="col-md-6  mt-2 mb-2 ">
    <div class="text-center">
      <h1 class="">  {{ post.title }}  </h1>
     
    </div>
    <br>
          
            <div class="row">
             
            <i class="fa fa-bed fa-2x ml-3 col-md-3 " title="Numar camere">: {{ post.room_nr }} </i>
            <h3 class="col-md-3">{{post.dimension}} m<sup>2</sup> </h3>
            <h3 class="col-md-4">Pret: {{post.price_month}}€</h3>
            </div>
            
     

    
    

    <br><br>
        <p> {{ post.description }} </p>



        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
<img :src="user.profile_picture" 
     height="120px" 
     width="120px" 
     class="rounded-circle">

</div>
</div>




</div>
</template>
<script>
import axios from '../axios-auth'
import globalMethods from '../mixins/globalMethods'
export default{
    mixins:[globalMethods],
 data() {
    return {
        post: '',
        images:[],
        id: this.$route.params.id,
        currentNumber: 0,
        active:'',
        incative:'',
        user:[]
    };
},
watch: {

    '$route'(to , from){
        this.id = to.params.id;
    },
    

},
mounted(){
this.get();
},

computed:{

     currentImage(){
         if(this.currentNumber == this.images.length){
             this.currentNumber = 0
         }
         if(this.currentNumber == 0){
             this.currentNumber = this.images.length
         }
      	return this.images[Math.abs(this.currentNumber) % this.images.length];
    }

},
methods:{
       get(){
     const id = this.id
     const vm = this
     const url = '/view/post/' + id
     axios.get(url)
     .then(response => {
       vm.post = response.data.post
       vm.images = vm.filter_array(Object.values(response.data.images))
       vm.user = response.data.user
       
    })
    .catch(error => console.log(error))

    },

    change(index){
        this.currentNumber = index
    },

    next(){
            this.currentNumber += 1
        },

    prev(){
           this.currentNumber -= 1
        },


   


}

}


</script>
<style scoped>
.circle{
    border-radius: 50%;
}
.check{
    border: solid 1px black;
}

.active{
    border: solid 1px rgba(236, 235, 235, 0.938);
}

.inactive{
    opacity: 0.5;
}
.arrowLeft {
    z-index: 1;
    position: absolute;
    top: 150px;
    left: 15px;
    }

    .arrowRight {
    z-index: 1;
    position: absolute;
    top: 150px;
    left: 395px;
    }
    #displayImage{
        height: 300px;
        width: 405px;
       
    }

</style>