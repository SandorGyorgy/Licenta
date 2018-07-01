<template>

<div class="container">
    <form  @submit.prevent="onSubmit" class="form-horizontal" role="form" >
     <div class="text-center">   
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Register</h2>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 field-label-responsive">
              
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input v-model="name" type="text" name="name" class="form-control" id="name"
                               placeholder="Nume" required autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put name validation error messages here -->
                        </span>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3 field-label-responsive"> </div>

            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input v-model="email" type="text" name="email" class="form-control" id="email"
                               placeholder="you@example.com" required autofocus>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put e-mail validation error messages here -->
                        </span>
                </div>
            </div>  
        </div>

         <div class="row">
            <div class="col-md-3 field-label-responsive">
              
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input 
                        v-model="phone" 
                        type="text" 
                        name="phone" class="form-control" 
                        id="phone"
                        placeholder="Numar Telefon" 
                        required autofocus>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put e-mail validation error messages here -->
                        </span>
                </div>
            </div>  
        </div>



        <div class="row">
            <div class="col-md-3 field-label-responsive">
              
            </div>
            
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input v-model="password" type="password" name="password" class="form-control" id="password"
                               placeholder="Parola" required>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                           <!-- <i class="fa fa-close"> </i> -->
                        </span>
                </div>
            </div>
        </div>


           <div class="row">
            <div class="col-md-3 field-label-responsive"> 
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                       
                       <input type="file" @change="onFileChange" ref="imageInput" style="display:none">
                       <a 
                    v-if="!preview"   
                    class="btn btn-info"
                    @submit.prevent 
                    @click="$refs.imageInput.click()"> <span class="image-picker"> Selectati Poza de Profil </span></a>
                    </div>

                   <div class="tz-gallery" >
                    <div class="row">
                    <div v-for="(image , index) in preview" :key="index"  class="col-sm-6 col-md-4">
                <div class="lightbox preview">
                    <h3 class="btn trash-button" @click="trash(index)">X</h3>
                    <img :src="image"  class="imageStyle rounded-circle" alt="Show">
                    
                </div>

            </div>
            </div>
            
                    </div>  
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                           <!-- <i class="fa fa-close"> </i> -->
                        </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success mb-3"><i class="fa fa-user-plus"></i> Register</button>
            </div>
        </div>
     </div>
    </form>
</div>

</template>

<script>
export default {
  data() {
    return {
      name: "",
      email: "",
      phone: "",
      password: "",
      profilePicture:"",
      preview:"",
    };
  },
  methods: {
      onFileChange(e){
      var files = e.target.files;
      this.profilePicture = files[0];
      var vm = this;  
    var photos = [];
      if(files){
         var reader = new FileReader();
         var image = '';
          reader.onload = function(e){
            image = e.target.result;
            photos.push(image); 
          }
          reader.readAsDataURL(files[0]);
        vm.preview = photos;
       
      }
  },


    onSubmit() {

        var formData = new FormData();
        formData.append('name' , this.name);
        formData.append('email' , this.email);
        formData.append('phone' , this.phone);
        formData.append('password' , this.password);
        formData.append('profilePicture' , this.profilePicture);

        

      
            axios.post('/api/user/register', formData)
            .then(  this.$router.push({ name: "login" }) )
             .catch(error => console.log(error))
      
       
    },

      trash(index){
        this.preview.splice(index , 1);
        this.profilePicture = "";
        
    },
  }
};
</script>

<style scoped>

.image-picker {
    color: white;
}

.imageStyle {
  width: 250px;
  height: 150px;
}

.preview{
    border-radius: 50%;
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

@media (min-width: 768px) {
  .field-label-responsive {
    padding-top: 0.5rem;
    text-align: right;
  }
}
</style>