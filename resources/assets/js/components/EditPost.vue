<template>
<div>

      
     <div class="container">
    <form  @submit.prevent="editPost" 
    class="form-horizontal" 
    role="form"
    enctype="multipart/form-data"
    >
     <div class="text-center">   
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>{{post.title}}</h2>
                <hr>
            </div>
        </div>



<div class="row">
    <div class="col-md-3 field-label-responsive"> Titlu </div>

    <div class="col-md-6">
        <div class="form-group">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <input 
                type="text"  
                class="form-control"
                v-model="post.title" 
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
    <div class="col-md-3 field-label-responsive"> Descriere </div>

    <div class="col-md-6">
        <div class="form-group">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <textarea-autosize   
                class="form-control" 
                v-model="post.description"
                
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
            <div class="col-md-3 field-label-responsive"> Numar Camere </div>

            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input 
                        type="number"  
                        class="form-control" 
                        v-model="post.room_nr"
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
            <div class="col-md-3 field-label-responsive"> Suprafata Utila </div>

            <div class="col-md-6">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <input 
                    type="number"
                    v-model="post.dimension"  
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
            <div class="col-md-3 field-label-responsive"> Adresa </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    
                 <div class="input-group mb-2 mr-sm-2 mb-sm-0">

                       <gmap-autocomplete
                            @place_changed="editLocation"
                            class="form-control" 
                            placeholder="Selectati adresa  din nou ">
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
            <div class="col-md-3 field-label-responsive"> Pret / Luna (Euro) </div>

            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input 
                        type="number"  
                        class="form-control" 
                        v-model="post.price_month"
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
            <div class="col-md-3 field-label-responsive"> Pret / 6 Luni (Euro)</div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                 <div class="input-group mb-2 mr-sm-2 mb-sm-0">


                     <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input 
                         type="number" 
                         class="form-control" 
                         v-model="post.price_half_year"
                         placeholder="Pret pe jumatate de an in euro ">
                    </div>
                        
                 </div>
                    
                </div>
            </div>

         
        </div>

    <!-- plata pe an -->
         <div class="row">
            <div class="col-md-3 field-label-responsive"> Pret / An (Euro)  </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                 <div class="input-group mb-2 mr-sm-2 mb-sm-0">

                 

                     <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="number"  
                        class="form-control" 
                        v-model="post.price_year"
                        placeholder="Pret pe an in euro " >
                    </div>
                 </div>
                </div>
            </div>

          

        </div> 


    <!-- Preview poze -->
        <div class="row">
                <div class="col-md-3 field-label-responsive"></div>
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
                    <h4>Imagini actuale</h4>
                    <div class="row">
                    <div v-for="(image , key) in images" 
                    :key="key" 
                    v-if="image"  
                    class="col-sm-6 col-md-4">
                    <div class="lightbox preview">
                    <h3 class="btn trash-button" @click="trash(key)" >X</h3>
                    <img  :src="image"  class="imageStyle" >
                   </div> 
                   </div>

                  </div>
               </div>   

                 <div class="tz-gallery">

                      <h4 v-if="imagesPreview"> Imagini noi </h4>
                    <div class="row">
                    <div v-for="(newImage , index) in imagesPreview" 
                    :key="index" 
                    v-if="newImage"  
                    class="col-sm-6 col-md-4">

                    <div class="lightbox preview">
                    <h3 class="btn trash-button" @click="trashNew(index)" >X</h3>
                    <img  :src="newImage"  class="imageStyle" >

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
                    Salveaza </button>
            </div>
        </div>
     </div>
    </form>
</div>

  <vue-snotify></vue-snotify>
    </div>
</template>

<script>
import axios from '../axios-auth'
import globalMethods from '../mixins/globalMethods';
export default {
      mixins:[globalMethods],
    data () {
        return {
            id: this.$route.params.id,
            images: '',
            post:{
                 description:""
             },
            location: '',
            imagesPreview: "",
            newImages: [],
            locatie: null,
            totalImagesLenght: '',
              eroare:{
            titlu:false,
            descriere:false,
            nrCamere:false,
            metriiPatrati:false,
            pretLuna:false,
            adresa:false
        }
          
        };
    },
    watch: {
        '$route'(to , from){
            this.id = to.params.id;
        },
    },

    beforeMount(){
        this.get()
    },


    methods: { 

        editLocation(place) {
      this.locatie = place;
   
      

    },

 onFileChange(e) {
      var files = e.target.files;
        //daca exista imagini pentru preview adauga la cele existente sau creaza array gol
      if(this.imagesPreview){
          var photos = this.imagesPreview
      }else{
           var photos = [];
      }
      var databaseImages =  this.filter_array(Object.values(this.images))
      var files_count = files.length + databaseImages.length + this.imagesPreview.length;

      var curentFileLength = files.length
    

    //daca sunt mai multe imagini de 8 nu se executa blockul si se afiseaza eroare      
      if (files && files_count <= 8) {
        const vm = this;
     

    //salveaza fisierele propriu zise intr-un array
            const formFiles = this.newImages
            for(let i = 0 ; i < curentFileLength; i++ ){
                formFiles.push(files[i])
            }
            this.newImages = formFiles
          
           
            
    


    //se transforma imaginile in binar
        for (let i = 0; i < curentFileLength; i++) {
          var reader = new FileReader();
          var image = "";
          reader.onload = function(e) {
            image = e.target.result;
            photos.push(image);
          };
          reader.readAsDataURL(files[i]);
        }
        vm.imagesPreview = photos
      }else{
          this.error('Eroare' , 'Puteti selecta maxim 8 imagini!')
      }
},
validate(){
        
        var eroareCount = 0;
        if(this.post.title == ''){
            this.eroare.titlu = true
            eroareCount = eroareCount+1
        }else{
            this.eroare.titlu = false
        }
   
        if(this.post.description == ''){
            this.eroare.descriere = true
            eroareCount = eroareCount+1
        }else{
            this.eroare.descriere = false
        }

        if(this.post.room_nr == ''){
            this.eroare.nrCamere = true
            eroareCount = eroareCount+1
        }else{
            this.eroare.nrCamere = false
        }

        if(this.post.dimension == '' ){
            this.eroare.metriiPatrati = true
            eroareCount = eroareCount+1
        }else{
            this.eroare.metriiPatrati = false
        }

        if(this.post.location == ''){
            this.eroare.adresa = true
            eroareCount = eroareCount+1
        }else{
            this.eroare.adresa = false
        }
        if(this.post.price_month == ''){
            this.eroare.pretLuna = true
            eroareCount = eroareCount +1
        }else{
            this.eroare.pretLuna = false
        }



        return eroareCount;

      },

editPost(){ 
            if(this.validate() == 0){

                   var edited = new FormData()
        edited.append("id" , this.post.id);
        edited.append("title" , this.post.title);
        edited.append("description" , this.post.description);
        edited.append("room_nr" , this.post.room_nr);
        edited.append("dimension" , this.post.dimension);
        if(this.post.price_half_year == null){
            this.post.price_half_year = ''
        }
        if(this.post.price_year == null){
            this.post.price_year = ''

        }
        edited.append("price_month" , this.post.price_month);
        edited.append("price_half_year" , this.post.price_half_year);
        edited.append("price_year" , this.post.price_year);

        var oldImages = JSON.stringify(this.images)

        edited.append('oldImages' , oldImages);

        if(this.locatie == null){
            edited.append('lat' , this.location.lat);
            edited.append('lng' , this.location.lng);
            edited.append('address' , this.location.address);
            edited.append('city' , this.location.city);
        }else{
            edited.append("lat" ,this.locatie.geometry.location.lat());
            edited.append("lng" ,this.locatie.geometry.location.lng());
          for(var i in this.locatie.address_components){
            if(this.locatie.address_components[i].types[0] == 'locality'){
                    edited.append("city" , this.locatie.address_components[i].short_name);
            }

      }
            edited.append("address" , this.locatie.formatted_address);
        }
       
       
        
         for(const item of this.newImages){
            edited.append("newImages[]" , item);
        }


        axios.post('/post/edit' , edited)
        .then(response => {
              console.log(response)
            if(response.status == 200){
                this.success('Succes' , 'Postare editata cu succes!')
              
            }
        })
        .catch(error =>{
            if(error.response.status == 401){
                this.error('Eroare' , 'Nu sunteti autorizat sa editati aceasta postare!')
            }
        })

            }else{
                this.error('Eroare' , 'Postarea nu a putut fi editata!')
            } 
     
         
        },


        get(){
     const id = this.id
     const vm = this
     const url = '/view/post/'+id
     const userId = localStorage.getItem('userId');
     
     axios.get(url)
     .then(response => {
         if(response.data.user.id == userId){
         vm.images = response.data.images
         vm.post = response.data.post
         vm.location = response.data.location
         console.log(response);
         }else{
             console.log('404')
         }
    })
    .catch(error => console.log(error))

    },

     setPlace(place) {
      this.form.currentPlace = place;
    },

     trash(key){
         if(this.totalImagesLenght > 1){
             this.images[key] = ""
         }else{
             this.error('Eroare' , 'Postarea trebuie sa contina cel putin o imagine!')
         }
        
    },
    trashNew(index){
         if(this.totalImagesLenght > 1){
            this.imagesPreview.splice(index , 1);
        this.newImages.splice(index, 1);
         }else{
             this.error('Eroare' , 'Postarea trebuie sa contina cel putin o imagine!')
         }
     
    },

    
    },

      computed:{
      charCount(){
          const num = this.post.description
          const ber = num.length
          return ber
      },
      imgCounter(){
         const array = this.filter_array(Object.values(this.images));
         const counter = array.length+this.imagesPreview.length; 
         if(counter < 8){
             this.totalImagesLenght = counter
             return true;
         }else{
             return false;
         }
         
      }
  }

}


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
  padding: 15px;
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