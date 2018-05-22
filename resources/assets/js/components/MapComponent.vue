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

    
    
     <gmap-marker
        :key="index"
        v-for="(m, index) in markers"
        :clickable="true"
        :position="m.position"
        @click="toggleInfoWindow(m,index)"
      >
    
      </gmap-marker> 

        <gmap-info-window
            :opened="infoWinOpen" 
            :position="infoWindowPos"
            @click="infoWinOpen=false"
            :options="infoOptions"
            >
      <div class="infoWindowStyles container">
          Titlu : {{ detalii.titlu }}
          <hr>
          Descriere : {{ detalii.descriere }}
          <hr>
          Numar camere : {{detalii.camere}}
          <hr>
          Pret :  {{detalii.pret}}
          <hr>
            Adresa : {{detalii.adresa}}
      </div>
        </gmap-info-window>
    

    </gmap-map>

     </div>



    </div>
</template>

<script>
export default {
  data() {
    return {
      center: { lat: 47.6567, lng: 23.585 },
      markers: [],
      places: [],
      currentPlace: null,
      infoWinOpen: false,
      infoWindowPos: null,
      detalii: {
        titlu: "",
        descriere: "",
        camere: "",
        dimensiune: "",
        pret: "",
        adresa: ""
      },

      infoOptions: {
        pixelOffset: {
          width: 0,
          height: -35
        }
      }
    };
  },

  mounted() {
    this.geolocate();
    this.showMarker();
  },

  methods: {
    setPlace(place) {
      this.currentPlace = place;
    },

    showMarker() {
      axios
        .get("/api/posts")
        .then(response => {
          const data = response.data;
          for (var i in data) {
            const marker = {
              lat: data[i].location.lat,
              lng: data[i].location.lng
            };
            const info = {
              titlu: data[i].title,
              descriere: data[i].description,
              camere: data[i].room_nr,
              pret: data[i].price_month,
              adresa: data[i].location.address
            };

            this.markers.push({ position: marker, info: info });
          }
        })
        .catch(error => console.log(error));
    },
    toggleInfoWindow(m, index) {
      this.infoWindowPos = m.position;
      this.infoWinOpen = !this.infoWinOpen;
      this.detalii.titlu = m.info.titlu;
      this.detalii.descriere = m.info.descriere;
      this.detalii.camere = m.info.camere;
      this.detalii.pret = m.info.pret;
      this.detalii.adresa = m.info.adresa;
    },

    addMarker() {
      if (this.currentPlace) {
        const marker = {
          lat: this.currentPlace.geometry.location.lat(),
          lng: this.currentPlace.geometry.location.lng()
        };
        this.center = marker;
        this.currentPlace = null;
      }
    },
    geolocate: function() {
      navigator.geolocation.getCurrentPosition(position => {
        this.center = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
      });
    }
  }
};
</script>

<style>
.infoWindowStyles {
  width: 250px;
}
</style>