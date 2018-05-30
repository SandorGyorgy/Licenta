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
                        placeholder="Titlu" required autofocus>
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
                        placeholder="Descriere" required autofocus>
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
                        placeholder="Numar camere" required autofocus>
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
                        placeholder="Metrii patrati" required autofocus>
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
                        placeholder="Pret pe luna " required autofocus>
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
                         placeholder="Pret pe jumatate de an  " required autofocus>
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
                        placeholder="Pret pe jumatate de an  " required autofocus>
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





<div v-if="!images">
    <input type="file" @change="onFileChange" multiple>
  </div>
  <div v-else class="tz-gallery" >

      <div class="row">
      <div v-for="image in images" :key="image.index"  class="col-sm-6 col-md-4">
  <div class="lightbox">
      <img :src="image"  class="imageStyle">
   </div>
 
    </div>
      </div>
    
    <button class="btn btn-danger mt-4"  @click="removeImage">Remove image</button>
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
    </div>
</template>

<script>
import axiosAuth from "../../axios-auth";
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
      images: ""
    };
  },



  methods: {
    setPlace(place) {
      this.currentPlace = place;
    },


     onFileChange(e){
      var files = e.target.files;
      var vm = this;  
    var photos = [];
      if(files){
        var files_count = files.length;
        for (let i=0; i<files_count; i++){
          var reader = new FileReader();
          var image = '';
         
          reader.onload = function(e){
            image = e.target.result;
            photos.push(image); 
          }
          reader.readAsDataURL(files[i]);
        }
        vm.images = photos;
      }
  },


    removeImage: function (e) {
      this.images = '';
    },

   

    addMarker() {
      const chirie = {
        lat: this.currentPlace.geometry.location.lat(),
        lng: this.currentPlace.geometry.location.lng(),
        address: this.currentPlace.formatted_address,
        title: this.titlu,
        description: this.descriere,
        room_nr: this.nrCamere,
        dimension: this.metriiPatrati,
        price_month: this.pretLuna,
        price_half_year: this.pretJumateAn,
        price_year: this.pretAn,
        id: this.id ,
        photos: this.images
      };

    console.log(chirie);
    //   axiosAuth
    //     .post(`/user/post`, chirie)
    //     .then(response => console.log(response))
    //     .catch(error => console.log(error));
    }
  }
};
</script>

<style>


.imageStyle{

    width: 350px;
    height: 250px;

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




@media(max-width: 768px) {
    body {
        padding: 0;
    }
}


</style>