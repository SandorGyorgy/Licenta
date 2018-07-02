<template>
  <div>
      <div class="row">
          
            <div class="col-md-6 container mt-2">
                <div class="form-group has-danger">
                    
                 <div class="input-group  mr-sm-2 mb-sm-0"
                  @keydown.enter.prevent="addMarker"
                 >
                        <gmap-autocomplete
                            @place_changed="setPlace" 
                            class="form-control"
                            placeholder="Introduceti o locatie">
                       </gmap-autocomplete>
                    
                        <div class="col-md-3 field-label-responsive"> 
              <button class="btn btn-info"
              @click="addMarker"
              > Cauta </button>
            </div>
                 </div>
                </div>
            </div>

        </div>
    
    <div class="mt-1 mb-3 mr-3 ml-3 pb-3"> 
    <gmap-map
      :center="center"
      :zoom="13"
      style="width:100%;  height: 600px; border: 1px solid black; " 
    >

    
  
     <gmap-marker
        :key="index"
        v-for="(m, index) in coordonates"
        :clickable="true"
        :position="{ lat : m.lat , lng : m.lng}"
        @click="toggleInfoWindow(m.coordIndex , { lat : m.lat , lng : m.lng})"
        
      >
      </gmap-marker> 
     
        <gmap-info-window
            :opened="infoWinOpen"
            :position="infoWindowPos"
            :options="infoOptions"
            @closeclick="infoWinOpen = !infoWinOpen"
          
            
            >

      <div class="infoWindowStyles container ml-3 text-center">

        <div v-for="(post , index) in openedInfowindow"
        :key="index"
         >
         <img :src="post.imagine" height="190px" width="230px" class="mt-2 ">
        <h6>  {{post.titlu}} </h6> 
        <p> {{post.descriere}}... </p>
        <h4> <span class="badge badge-pill badge-primary"> {{post.pret}} €</span>
          <span class="badge badge-pill badge-primary"> {{post.dimensiune}}  m<sup>2</sup></span>
          <span class="badge badge-pill badge-primary"> 
 <i class="fa fa-bed  ">: {{ post.camere }} </i>
          </span>
         
          </h4> 
       
          <div class="container mt-3">

            <div>
            
        
                <router-link v-if="post.id" :to="{ name: 'post' , params:{ id : post.id } }">
              <button 
              class="btn btn-success ml-3"
              >
                  Vizualizeaza Chiria
              </button> 
        </router-link>

            </div>
      </div>
      <hr v-if="openedInfowindow.length > 1">
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
       infoOptions: {
        pixelOffset: {
          width: 0,
          height: -35
        }
      },
      coordonates:[],
      openedInfowindow:[]
   
    };
  },

  beforeMount() {
    this.showMarker();
    if(this.$store.state.visitPlace != null){
      this.center = this.$store.state.visitPlace
 
    }
   
  },
  computed:{

    currentImage(){
      	// return this.detalii.poze[Math.abs(this.currentNumber) % this.detalii.poze.length];
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
          var data = response.data;
        
          for (var i in data) {
           this.markers.push(data[i])
            
          }

          for(var i in this.markers){
            const test = this.markers[i]
            const numarApartamente = test.length
            const position = {
              lat : test[0].location.lat,
              lng : test[0].location.lng,
              coordIndex : i ,
              numarApartamente : numarApartamente
            }
             
            this.coordonates.push(position)
           
          }   
              
        })
        .catch(error => console.log(error));

        
    },


    toggleInfoWindow(index , position) {
     
      this.openedInfowindow = [];
      for(var i in this.markers[index]){
        const test = this.markers[index]
        const info = test[i]
        this.infoWindowPos = position
        var imagini = Object.values(info.images)
        var descriere = info.description.substring( 0 , 30)
        var detalii = {
            titlu : info.title,
            descriere : descriere,
            pret : info.price_month ,
            imagine : imagini[0] ,
            camere : info.room_nr,
            dimensiune : info.dimension,
            id : info.id

        }
        this.openedInfowindow.push(detalii)
      }
     if(this.infoWinOpen == false){
       this.infoWinOpen = true;
     }else{
       this.infoWinOpen = false;
     }
      
    
      
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
        console.log(this.currentPlace);
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
  height: 350px;
 
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