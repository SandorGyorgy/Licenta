<template>
  <div>

      
     <div class="container">
    <form  @submit.prevent="adaugaChirie"
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
                v-model="form.titlu" 
                placeholder="Titlu">
            </div>
        </div>
    </div>

    <div class="col-md-3" v-if="eroare.titlu">
        <div class="form-control-feedback">
                <span class="text-danger align-middle">
                    Nu ati adaugat un titlu 
                </span>
        </div>
    </div>  
</div>



<div class="row">
    <div class="col-md-3 field-label-responsive"> </div>

    <div class="col-md-6">
        <div class="form-group">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <textarea-autosize   
                class="form-control" 
                v-model="form.descriere"
                
                maxlength="1000"
                placeholder="Descriere">
                
                </textarea-autosize>
                
            </div>
                <span class="float-right char-count">{{  charCount }}/1000</span>
        </div>
    </div>

    <div class="col-md-3" v-if="eroare.descriere">
        <div class="form-control-feedback">
                <span class="text-danger align-middle">
                    Nu ati ales o descriere
                </span>
        </div>
    </div>  
</div>



    <!-- Numar camere -->
         <div class="row">
            <div class="col-md-3 field-label-responsive"> </div>

            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input 
                        type="number"  
                        class="form-control" 
                        v-model="form.nrCamere"
                        placeholder="Numar camere">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-control-feedback" v-if="eroare.nrCamere">
                        <span class="text-danger align-middle">
                            Nu ati precizat numarul de camere
                        </span>
                </div>
            </div>  
        </div>

    <!-- metri patrati -->
        <div class="row">
            <div class="col-md-3 field-label-responsive"> </div>

            <div class="col-md-6">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <input 
                    type="number"
                    v-model="form.metriiPatrati"  
                    class="form-control" 
                    placeholder="Metrii patrati" >
                </div>
            </div>
            </div>

            <div class="col-md-3" v-if="eroare.metriiPatrati">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                                Nu ati precizat suprafata utila
                        </span>
                </div>
            </div>  
        </div>
    
    <!-- Adresa chirie -->
        <div class="row">
            <div class="col-md-3 field-label-responsive"> </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    
                 <div class="input-group mb-2 mr-sm-2 mb-sm-0"
                 >
                        <gmap-autocomplete
                            @place_changed="adaugaAdresa" 
                            class="form-control" 
                            placeholder="Selectati adresa chiriei cautate">
                       </gmap-autocomplete>
                 </div>
                    
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-control-feedback" v-if="eroare.currentPlace">
                        <span class="text-danger align-middle">
                            Nu ati ales adresa chiriei
                        </span>
                </div>
            </div>
        </div>

    <!-- plata pe luna -->
        <div class="row">
            <div class="col-md-3 field-label-responsive"> </div>

            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input 
                        type="number"  
                        class="form-control" 
                        v-model="form.pretLuna"
                        placeholder="Pret pe luna in euro">
                    </div>
                </div>
            </div>

            <div class="col-md-3" v-if="eroare.pretLuna">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                                Nu ati precizat un pret
                        </span>
                </div>
            </div>  
        </div>

    <!-- plata pe jumate de an  -->
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
                         v-model="form.pretJumateAn"
                         placeholder="Pret pe jumatate de an in euro ">
                    </div>
                        
                 </div>
                    
                </div>
            </div>

         
        </div>

    <!-- plata pe an -->
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
                        v-model="form.pretAn"
                        placeholder="Pret pe jumatate de an in euro " >
                    </div>
                    


                 </div>
                </div>
            </div>

          

        </div> 


    <!-- Preview poze -->
        <div class="row">
                <div class="col-md-3 field-label-responsive"> </div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">

                <div v-if="imgCounter">
                    <input type="file" 
                    style="display: none" 
                    ref="imageInput" 
                    @change="onFileChange" 
                    multiple>
                    <a 
                    class="btn btn-info"
                    @submit.prevent 
                    @click="$refs.imageInput.click()"> <span class="image-picker"> Selectati Imagini </span></a>
                </div> 
                <div class="tz-gallery" >
                    <div class="row">
                    <div v-for="(image , index) in form.images" :key="index"  class="col-sm-6 col-md-4">
                <div class="lightbox preview">
                    <h3 class="btn trash-button" @click="trash(index)">X</h3>
                    <img :src="image"  class="imageStyle" >
                    
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
                <button  class="btn btn-success mb-3 bWidth"
                type="submit"
                :disabled="seTrimite == true">
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
import globalMethods from '../../mixins/globalMethods';
export default {
    mixins:[globalMethods],
  data() {
    return {
        form: {
            currentPlace: null,
            titlu: "",
            descriere: "",
            nrCamere: "",
            metriiPatrati: "",
            pretLuna: "",
            pretJumateAn: "",
            pretAn: "",
            images: "",
            files:[],
        },
        id: localStorage.getItem("userId"),
        plata_jumate_an: false,
        plata_an: false,
        seTrimite: false,
        eroare:{
            titlu:false,
            descriere:false,
            nrCamere:false,
            metriiPatrati:false,
            pretLuna:false,
            currentPlace:false
        }
        
    };
  },

  methods: {

      validate(){
          var form = this.form
          var eroareCount = 0
          if(form.currentPlace == null){
              this.eroare.currentPlace = true
              eroareCount = eroareCount+1
          }else{
              this.eroare.currentPlace = false
          }
        if(form.titlu == ''){
              this.eroare.titlu = true
              eroareCount = eroareCount+1
          }else{
              this.eroare.titlu = false
          }
        if(form.descriere == ''){
              this.eroare.descriere = true
              eroareCount = eroareCount+1
          }else{
               this.eroare.descriere = false
          }
        if(form.nrCamere == ''){
              this.eroare.nrCamere = true
              eroareCount = eroareCount+1
          }else{
               this.eroare.nrCamere = false
          }
        if(form.pretLuna == ''){
              this.eroare.pretLuna = true
              eroareCount = eroareCount+1
          }else{
              this.eroare.pretLuna = false
          }
        if(form.metriiPatrati == ''){
              this.eroare.metriiPatrati = true
              eroareCount = eroareCount+1
          }else{
               this.eroare.metriiPatrati = false
          }
        if(form.files.length == 0){
            this.error('eroare' , 'Trebuie sa selectati cel putin o imagine')
             eroareCount = eroareCount+1
        } 

        return eroareCount;

      },

    adaugaAdresa(place) {
      this.form.currentPlace = place;

    },

    onFileChange(e) {
            var files = e.target.files;
        
        //daca exista imagini pentru preview adauga la cele existente sau creaza array gol
            if(this.form.images){
                var photos = this.form.images
            }else{
                var photos = [];
            }
            var files_count = files.length + this.form.images.length;
            var curentFileLength = files.length
        //daca sunt mai multe imagini de 8 nu se executa blockul si se afiseaza eroare      
            if (files && files_count <= 8) {
                const vm = this;
                //const photos = [];

        // daca exista fisiere adauga la cele existente sau creaza array de fisiere nou
                
                    const formFiles = this.form.files
                    for(let i = 0 ; i < curentFileLength; i++ ){
                        formFiles.push(files[i])
                    }
                    this.form.files = formFiles
                
                



                for (let i = 0; i < curentFileLength; i++) {
                var reader = new FileReader();
                var image = "";
                reader.onload = function(e) {
                    image = e.target.result;
                    photos.push(image);
                };
                reader.readAsDataURL(files[i]);
                }
                vm.form.images = photos
            }else{
                this.eroare('Eroare' , '')
            }
    },

    trash(index){
        this.form.images.splice(index , 1);
        this.form.files.splice(index , 1);
        
    },

    reset(){
         this.form = {
            currentPlace: null,
            titlu: "",
            descriere: "",
            nrCamere: "",
            metriiPatrati: "",
            pretLuna: "",
            pretJumateAn: "",
            pretAn: "",
            images: "",
            files:[],
        }
    },

    adaugaChirie() {
        
        if(this.validate() == 0){
            if(this.form.currentPlace){
            
           const vm = this; 
        var chirie = new FormData();
        chirie.append("lat" ,this.form.currentPlace.geometry.location.lat());
        chirie.append("lng" ,this.form.currentPlace.geometry.location.lng());
        chirie.append("address" , this.form.currentPlace.formatted_address);
         for(var i in this.form.currentPlace.address_components){
          if(this.form.currentPlace.address_components[i].types[0] == 'locality'){
                chirie.append("city" , this.form.currentPlace.address_components[i].short_name);
          }

      }
       
        chirie.append("title" , this.form.titlu);
        chirie.append("description" , this.form.descriere);
        chirie.append("room_nr" , this.form.nrCamere);
        chirie.append("dimension" , this.form.metriiPatrati);
        chirie.append("price_month" , this.form.pretLuna);
        chirie.append("price_half_year" , this.form.pretJumateAn);
        chirie.append("price_year" , this.form.pretAn);
        chirie.append("id" , this.id);

        for(const item of this.form.files){
            chirie.append("images[]" , item);
        }

      this.seTrimite = true ;

        axiosAuth
          .post(`/user/post`, chirie)
          .then( function(response){
              if(response.status == 200){
                   vm.success("Succes!" , "Chiria a fost adaugata!");
                   vm.reset();
                   vm.seTrimite = false;
              }

              console.log(response)
          })
          .catch(eroare =>{
              if(eroare){
                  vm.eroare("Eroare!" , "A aparut o eroare , incercati din nou mai tarziu!");
                   vm.seTrimite = false;
              }
          });

     }



        }
    
      
   
    }
  },
  computed:{
      charCount(){
          const num = this.form.descriere
          const ber = num.length
          return ber
      },
      imgCounter(){
         const array =  this.form.images;
         const counter = array.length; 
         if(counter < 8){
             return true;
         }else{
             return false;
         }
         
      }
  },

 

};
</script>

<style scoped>
.image-picker {
    color: white;
}

.char-count{
    z-index: 3;
    position: absolute;
    bottom: 12px;
    right: 18px;
    color: rgb(168, 168, 168);
}

.trash-button {
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