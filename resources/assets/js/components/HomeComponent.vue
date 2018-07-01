<template>

<div class="p-3 ">
        <div class="row mb-4 ml-1 mr-1">
            <div class=" text-center col-md-12 mb-2 container mx-auto" style="width: 250px;"  id="form-container">
                    <h5 class="card-title">Card title</h5>

                    <div class="card-body ">
                        <div class="card-text">

                            <gmap-autocomplete
                            @place_changed="visitPlace" 
                            class="form-control"
                            placeholder="Introduceti o locatie">
                       </gmap-autocomplete>

                        </div>

                    </div>

                
            </div>

<div class="col-md-4"></div>

      
    </div>



    
    <div class="card-deck text-center mr-1 ">

        <div class="card " style="width: 18rem;" v-for="(oras , index) in topPlaces" 
        v-if="oras"
        :key="index">

        <img class="card-img-top" 
        :src="oras.url" height="200px" width="100%">
        <div class="card-body ">
            <h5 class="card-title">{{ oras.city }}</h5>
            <p class="card-text">Pret Mediu / chirie {{ oras.avg_price }} € <br> Total chirii disponibile {{ oras.total }} </p>
            <a href="#" class="btn btn-primary">Vizualizeaza Chiriile din {{oras.city}}</a>
        </div>
        </div>

    </div>


     
</div>

</template>
<script>
export default {
  data() {
    return {
      formClasses: "form-group float-right mr-1",
      topPlaces: '',
      place:''
    };
  },
  beforeMount(){
      this.getUserData
      this.getBestPlaces()
  },
  methods:{
      getUserData(){
          this.$store.dispatch("authUserData");
      },
      visitPlace(place) {
      this.place = place;
      const coords = {
          lat: this.place.geometry.location.lat(),
          lng: this.place.geometry.location.lng()
      }
      this.$store.dispatch('visit' , coords)
      this.$router.push({ name: "map" });
     
    },
      getBestPlaces(){

          axios.get('api/mostpopular')
          .then(response=> {
              this.topPlaces = response.data
             
          })
          .catch(error =>{
              console.log(error)
          })
      }
  }
}
</script>

<style scoped >
.alignCenter {
  text-align: center;
  align-items: center;
}
#form-container {
  width: 250px;
  border: 1px solid black;
  border-radius: 5px;
  height: 350px;
}
</style>