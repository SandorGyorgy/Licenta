<template>
<div>
<div class="row">
<div class="col-md-5">

    <div  class="mb-2 mt-2 ml-1" id="displayImage">
            <img :src="currentImage" height="100%" width="100%">
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
    class="ml-1 mb-1">



</div>

<div class="col-md-6  check mt-2 mb-2  text-center">
    <div class="text-center">
      <h1 class="">  {{ post.title }}  </h1>
     
    </div>
    <br>
    <div class="row">
        <i class="fa fa-bed fa-2x ml-3" title="Numar camere">: {{ post.room_nr }} </i>
        <h3 class="offset-2">  40  m<sup>2</sup> </h3>
        <h3 class="offset-2"> {{post.price_month}}  €</h3>
    </div>

    <br><br>
        
        <h5> {{ post.description }} </h5>
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
import axios from '../axios-auth'
export default{
 data() {
    return {
        post: '',
        images:[],
        id: this.$route.params.id,
        currentNumber: 0,
        active:'',
        incative:''
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
      // console.log(response.data)
    })
    .catch(error => console.log(error))

    },
    change(index){
        this.currentNumber = index
    },
    next: function() {
            this.currentNumber += 1
        },
    prev: function() {
           this.currentNumber -= 1
        },
    filter_array(test_array) {
    var index = -1,
    arr_length = test_array ? test_array.length : 0,
    resIndex = -1,
    result = [];
    while (++index < arr_length) {
    var value = test_array[index];
    if (value) {
        result[++resIndex] = value;
    }
    }
    return result;
    }


}

}


</script>
<style scoped>

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