<template>
  <div>
    <nav class="navbar navbar-light navbar-inverse" role="navigation" >
       <label>
        <gmap-autocomplete
          @place_changed="setPlace" style="width: 300px">
        </gmap-autocomplete>
        <button @click="addMarker">Add</button>
       </label>
      <br/>
    </nav>
    
   


    </div>
</template>

<script>
export default {
  data() {
    return {
      markers: [],
      places: [],
      currentPlace: null
    };
  },

  mounted() {
    
  },

  methods: {
    setPlace(place) {
      this.currentPlace = place;
    },
    addMarker() {
        const type = this.currentPlace.types[0]
      if (this.currentPlace && type === "street_address") {
         
        const marker = {
          lat: this.currentPlace.geometry.location.lat(),
          lng: this.currentPlace.geometry.location.lng(),
          //street: this.currentPlace.address_components[2].long_name,
          //city: this.currentPlace.address_components[3].long_name,
          //county: this.currentPlace.address_components[4].long_name,
          
        };
        this.markers.push(marker);
        this.places.push(this.currentPlace);
        this.center = marker;
        console.log(this.currentPlace);
         this.currentPlace = null;
      } else {
          console.log('Works')
      }
    },
  
  }
};
</script>

<style>



</style>