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
    
    <div class="m-3 pb-3"> 
    <gmap-map
      :center="center"
      :zoom="12"
      style="width:100%;  height: 500px; border: 1px solid black; " 
    >

    <gmap-info-window>Hello world!</gmap-info-window>
     <gmap-marker
        :key="index"
        v-for="(m, index) in markers"
        :clickable="true"
        :position="m.position"
      ></gmap-marker> 

    

    </gmap-map>

     </div>



    </div>
</template>

<script>
export default {
  data() {
    return {
      center: { lat: 45.508, lng: -73.587 },
      markers: [ {position :{ lat: 45.508, lng: -73.587 } }],
      places: [],
      currentPlace: null
    };
  },

  mounted() {
    this.geolocate();
  },

  methods: {
    setPlace(place) {
      this.currentPlace = place;
    },
    addMarker() {
      if (this.currentPlace) {
        const marker = {
          lat: this.currentPlace.geometry.location.lat(),
          lng: this.currentPlace.geometry.location.lng(),
          
        };
        this.markers.push({ position : marker });
        this.places.push(this.currentPlace);
        this.center = marker;
        this.currentPlace = null;
        console.log(this.markers);
      }
    },
    geolocate: function() {
      navigator.geolocation.getCurrentPosition(position => {
        this.center = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        
        
      });
    },
    openInfoWindowTemplate(item){
        this.setInfoWindowTemplate(item)
        this.infoWindow.position = this.getCoordinates(item)
        this.infoWindow.open = true
   }
  }
};
</script>

<style>



</style>