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
                v-model="post.title" 
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

    <div class="col-md-3">
        <div class="form-control-feedback">
                <span class="text-danger align-middle">

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
                        v-model="post.room_nr"
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

    <!-- metri patrati -->
        <div class="row">
            <div class="col-md-3 field-label-responsive"> </div>

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

            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                                
                        </span>
                </div>
            </div>  
        </div>
    
    <!-- Adresa chirie -->
        <div class="row">
            <div class="col-md-3 field-label-responsive"> </div>
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
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">

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
                        v-model="post.price_month"
                        placeholder="Pret pe luna in euro">
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

    <!-- plata pe jumate de an  -->
         <div class="row">
            <div class="col-md-3 field-label-responsive"> </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                 <div class="input-group mb-2 mr-sm-2 mb-sm-0">

                    <!-- <div class="form-check" >
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" @click="plata_jumate_an = !plata_jumate_an">
                        Acceptati plata pe jumatate de an 
                        </label>
                    </div> -->

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
            <div class="col-md-3 field-label-responsive"> </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                 <div class="input-group mb-2 mr-sm-2 mb-sm-0">

                   <!-- <div class="form-check" >
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" @click="plata_an = !plata_an">
                        Acceptati plata pe  an 
                        </label>
                    </div> -->

                     <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="number"  
                        class="form-control" 
                        v-model="post.price_year"
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
                    <h3 class="btn trash-button" @click="trash(key)" >X</h3>
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
            locatie: null
          
        };
    },
    watch: {
        '$route'(to , from){
            this.id = to.params.id;
        },
    },

    mounted(){
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
          this.error('Eroare' , '')
      }
    },

        editPost(){  
        var edited = new FormData()
    
       
        edited.append("id" , this.post.id);
        edited.append("title" , this.post.title);
        edited.append("description" , this.post.description);
        edited.append("room_nr" , this.post.room_nr);
        edited.append("dimension" , this.post.dimension);
        edited.append("price_month" , this.post.price_month);
        edited.append("price_half_year" , this.post.price_half_year);
        edited.append("price_year" , this.post.price_year);

        var oldImages = JSON.stringify(this.images)

        edited.append('oldImages' , oldImages);

        if(this.locatie == null){
            edited.append('lat' , this.location.lat);
            edited.append('lng' , this.location.lng);
            edited.append('address' , this.location.address)
        }else{
            edited.append("lat" ,this.locatie.geometry.location.lat());
            edited.append("lng" ,this.locatie.geometry.location.lng());
            edited.append("address" , this.locatie.formatted_address);
        }
       
       
        
         for(const item of this.newImages){
            edited.append("newImages[]" , item);
        }

    //     for (var pair of edited.entries()) {
    // console.log(pair[0]+ ', ' + pair[1]); 
    // }

        axios.post('/post/edit' , edited)
        .then(response=> console.log(response))
        .catch(error =>console.log(error))
 
        },


        get(){
     const id = this.id
     const vm = this
     const url = '/view/post/'+id
     axios.get(url)
     .then(response => {
         vm.images = response.data.images
         vm.post = response.data.post
         vm.location = response.data.location
         
       
    })
    .catch(error => console.log(error))

    },

     setPlace(place) {
      this.form.currentPlace = place;
    },

     trash(key){
        this.images[key] = ""
        //console.log(this.images)
    }

    
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