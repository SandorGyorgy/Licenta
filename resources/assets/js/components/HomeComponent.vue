<template>

<div class="p-3 ">
        <div class="row mb-4 ml-1 mr-1">
            <div class=" text-center col-md-12 mb-2 container mx-auto card bg-primary"  id="form-container">
                  

                    <div class="card-body ">
                        <div class="card-text">
                        
                        <gmap-autocomplete
                            @place_changed="visitPlace" 
                            class="form-control"
                            style="height: 60px;
                             font-size:30px; 
                             color:#489CFB;
                             position:relative;
                             top: 120px;
                             "
                            placeholder="Introduceți o locație">
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
            <p class="card-text">Preț Mediu / chirie {{ oras.avg_price }} € <br> Total chirii disponibile {{ oras.total }} </p>
            <button
            @click.prevent="visitCity(oras.city)" 
            class="btn btn-primary">Vizualizează Chiriile din {{oras.city}}</button>
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
      place:'',
    
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
    visitCity(data){
      var completeAddress = data+' România'
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({'address': completeAddress}, (results, status) => {
        if (status === 'OK') {
            const test = {
            lat : results[0].geometry.location.lat(),
            lng : results[0].geometry.location.lng()
            }
            this.$store.dispatch('visit' , test)
            this.$router.push({ name: "map" });
        }
      });
    
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