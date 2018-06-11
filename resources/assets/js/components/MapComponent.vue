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

      <div class="infoWindowStyles container ml-3">

        <div  v-for="number in [currentNumber]"
          :key="number" 
          v-if="currentImage">
             <img :src="currentImage" height="200px" width="230px" class="mt-2 ">

              <div class="arrowLeft">
                <i @click="prev" class="fa fa-chevron-left fa-3x"></i>
              </div>

              <div class="arrowRight">
                <i @click="next" class="fa fa-chevron-right fa-3x"></i>
              </div>
        </div>
          <div class="container mt-3">

            <div>
              $ {{ detalii.pret }}
            </div>

          </div>
        
       
         
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
      currentNumber:0,
      detalii: {
        titlu: "",
        descriere: "",
        camere: "",
        dimensiune: "",
        pret: "",
        adresa: "",
        poze:[]
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
    this.showMarker();
  },
  computed:{

    currentImage(){
      	return this.detalii.poze[Math.abs(this.currentNumber) % this.detalii.poze.length];
    }

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
              adresa: data[i].location.address,
              poze: Object.values(response.data[i].images)
             
              
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
      this.detalii.poze =  this.filter_array(m.info.poze);
      
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
},

    next: function() {
            this.currentNumber += 1
        },
        prev: function() {
            this.currentNumber -= 1
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
   
  }
};
</script>

<style>
.infoWindowStyles {
  width: 250px;
 
}

 .infoWindowStyles .arrowRight {
 
    position: absolute;
  top: 85px;
  left: 229px;
    }

    .infoWindowStyles .arrowLeft {
 
    position: absolute;
  top: 89px;
  right: 229px;
    }

   


</style>