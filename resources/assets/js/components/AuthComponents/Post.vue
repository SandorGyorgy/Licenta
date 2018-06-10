<template>
  <div>

      
     <div class="container">
    <form  @submit.prevent="addMarker" 
    class="form-horizontal" 
    role="form"
    enctype="multipart/form-data"
    >
     <div class="text-center">   
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Adaugati o chirie noua</h2>
                <hr>
            </div>
        </div>



            <div class="row">
            <div class="col-md-3 field-label-responsive"> </div>

            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input 
                        type="text"  
                        class="form-control"
                        v-model="titlu" 
                        placeholder="Titlu">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">

                        </span>
                </div>
            </div>  
        </div>



         <div class="row">
            <div class="col-md-3 field-label-responsive"> </div>

            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <textarea   
                        class="form-control" 
                        v-model="descriere"
                        placeholder="Descriere">
                        </textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">

                        </span>
                </div>
            </div>  
        </div>



         <div class="row">
            <div class="col-md-3 field-label-responsive"> </div>

            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input 
                        type="number"  
                        class="form-control" 
                        v-model="nrCamere"
                        placeholder="Numar camere">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">

                        </span>
                </div>
            </div>  
        </div>

 <div class="row">
            <div class="col-md-3 field-label-responsive"> </div>

            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input 
                        type="number"
                        v-model="metriiPatrati"  
                        class="form-control" 
                        placeholder="Metrii patrati" >
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">

                        </span>
                </div>
            </div>  
        </div>
        

        <div class="row">
            <div class="col-md-3 field-label-responsive"> </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    
                 <div class="input-group mb-2 mr-sm-2 mb-sm-0">

                        <gmap-autocomplete
                            @place_changed="setPlace"  
                            class="form-control" 
                            placeholder="Selectati adresa chiriei cautate">
                       </gmap-autocomplete>
                 </div>
                    
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">

                        </span>
                </div>
            </div>
        </div>

        


        <div class="row">
            <div class="col-md-3 field-label-responsive"> </div>

            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input 
                        type="number"  
                        class="form-control" 
                        v-model="pretLuna"
                        placeholder="Pret pe luna ">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">

                        </span>
                </div>
            </div>  
        </div>


         <div class="row">
            <div class="col-md-3 field-label-responsive"> </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                 <div class="input-group mb-2 mr-sm-2 mb-sm-0">

                    <div class="form-check" >
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" @click="plata_jumate_an = !plata_jumate_an">
                        Acceptati plata pe jumatate de an 
                        </label>
                    </div>

                     <div class="input-group mb-2 mr-sm-2 mb-sm-0" v-if="plata_jumate_an">
                        <input 
                         type="number" 
                         class="form-control" 
                         v-model="pretJumateAn"
                         placeholder="Pret pe jumatate de an  ">
                    </div>
                        
                 </div>
                    
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">

                        </span>
                </div>
            </div>
        </div>


         <div class="row">
            <div class="col-md-3 field-label-responsive"> </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                 <div class="input-group mb-2 mr-sm-2 mb-sm-0">

                   <div class="form-check" >
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" @click="plata_an = !plata_an">
                        Acceptati plata pe  an 
                        </label>
                    </div>

                     <div class="input-group mb-2 mr-sm-2 mb-sm-0" v-if="plata_an">
                        <input type="number"  
                        class="form-control" 
                        v-model="pretAn"
                        placeholder="Pret pe jumatate de an  " >
                    </div>
                    


                 </div>
                </div>
            </div>

           <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">

                        </span>
                </div>
            </div>

        </div> 



    <div class="row">
            <div class="col-md-3 field-label-responsive"> </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                 <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                   <div class="input-group mb-2 mr-sm-2 mb-sm-0">

<div v-if="!images">
    <input type="file" @change="onFileChange" multiple>
  </div> 
  <div v-else class="tz-gallery" >
      <div class="row">
      <div v-for="image in images" :key="image.index"  class="col-sm-6 col-md-4">
  <div class="lightbox preview">
      <h3 class="btn profilebutton">X</h3>
      <img :src="image"  class="imageStyle" alt="Show">
      
   </div>
 
    </div>
      </div>
    
              </div>  
        </div>
    </div>
    </div>

</div> 
  </div>

  

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success mb-3 bWidth ">
                    <i class="fa fa-plus-circle"></i>
                    Adauga Chirie</button>
            </div>
        </div>
     </div>
    </form>
</div>

  <vue-snotify></vue-snotify>
    </div>
</template>

<script>
import axiosAuth from "../../axios-auth";
import {SnotifyPosition, SnotifyStyle} from 'vue-snotify';
export default {
  data() {
    return {
      markers: [],
      places: [],
      currentPlace: null,
      plata_jumate_an: false,
      plata_an: false,
      titlu: "",
      descriere: "",
      nrCamere: "",
      metriiPatrati: "",
      pretLuna: "",
      pretJumateAn: "",
      pretAn: "",
      id: localStorage.getItem("userId"),
      images: "",
      files:[]
    };
  },

  methods: {
    setPlace(place) {
      this.currentPlace = place;
    },

    onFileChange(e) {
      var files = e.target.files;
      this.files = files; 
      var vm = this;
      var photos = [];
      if (files) {
        var files_count = files.length;
        for (let i = 0; i < files_count; i++) {
          var reader = new FileReader();
          var image = "";
          reader.onload = function(e) {
            image = e.target.result;
            photos.push(image);
          };
          reader.readAsDataURL(files[i]);
        }
        vm.images = photos
      }
    },

    removeImage: function(e) {
      this.images = "";
    },

    error(text , continut){
        this.$snotify.create({
            title: text,
            body: continut,
            config: {
                    position: SnotifyPosition.rightTop,
                    type : SnotifyStyle.error,
            }
        })
    },
      success(text , continut){
        this.$snotify.create({
            title: text,
            body: continut,
            config: {
                    position: SnotifyPosition.rightTop,
                    type : SnotifyStyle.success,
            }
        })
    },

    addMarker() {
       
        var chirie = new FormData();
        chirie.append("lat" ,this.currentPlace.geometry.location.lat());
        chirie.append("lng" ,this.currentPlace.geometry.location.lng());
        chirie.append("address" , this.currentPlace.formatted_address);
        chirie.append("title" , this.titlu);
        chirie.append("description" , this.descriere);
        chirie.append("room_nr" , this.nrCamere);
        chirie.append("dimension" , this.metriiPatrati);
        chirie.append("price_month" , this.pretLuna);
        chirie.append("price_half_year" , this.pretJumateAn);
        chirie.append("price_year" , this.pretAn);
        chirie.append("id" , this.id);

        for(const item of this.files){
            chirie.append("images[]" , item);
        }

        axiosAuth
          .post(`/user/post`, chirie)
          .then( function(response){
              if(response.status == 200){
                 this.success("Succes!","Chiria a fost adaugata!");
              }else{
                   this.error("Eroare!" , "A aparut o eroare , incercati din nou!")
              }
          })
          .catch(error => console.log(error));
    
    }
  }
};
</script>

<style scoped>

.profilebutton {
    z-index: 2;
    position: absolute;
    right: -6px;
    top: -6px;
    float: right;
    margin: auto;
    font-weight: bold;
    }
    h3{
        color: rgb(102, 102, 102);
    }
    h3:hover{
        color: red;
    }


.imageStyle {
  width: 250px;
  height: 150px;
}

.tz-gallery {
  padding: 40px;
}

/* Override bootstrap column paddings */
.tz-gallery .row > div {
  padding: 2px;
}

.tz-gallery .lightbox img {
  width: 100%;
  border-radius: 0;
  position: relative;
}

@media (max-width: 768px) {
  body {
    padding: 0;
  }
}
</style>