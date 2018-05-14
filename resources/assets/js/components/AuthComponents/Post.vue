<template>
  <div>
     <div class="container">
    <form  @submit.prevent="addMarker" class="form-horizontal" role="form">
     <div class="text-center">   
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Adaugati o chirie noua</h2>
                <hr>
            </div>
        </div>



        <!-- <div class="row">
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
                            @place_changed="setPlace"  class="form-control" placeholder="Selectati adresa chiriei cautate">
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

        </div> -->

  

        




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

import axiosAuth from '../../axios-auth';
export default {
      
  data() {
    return {
      markers: [],
      places: [],
      currentPlace: null,
      plata_jumate_an: false,
      plata_an: false,
      titlu : '',
      descriere : '',
      nrCamere: '',
      metriiPatrati: '',
      pretLuna: '',
      pretJumateAn: '',
      pretAn: '',
      id: localStorage.getItem('userId')
    };
  },

  mounted() {
    
  },

  methods: {
    setPlace(place) {
      this.currentPlace = place;
    },
    addMarker() {
        //const type = this.currentPlace.types[0]
      
        const chirie = {
          lat: '45.5841',//this.currentPlace.geometry.location.lat(),
          lng: '47.2541', //this.currentPlace.geometry.location.lng(),
          city: 'Baia Mare',//this.currentPlace.address_components[3].long_name,
          county: 'Maramures' ,//this.currentPlace.address_components[4].long_name,
          n_hood: 'Hatvan',
          title: 'Test',//this.titlu,
          description: 'Test test test',//this.descriere,
          room_nr: '45',//this.nrCamere,
          dimension: '45',//this.metriiPatrati,
          price_month: '450',//this.pretLuna,
          price_half_year: this.pretJumateAn,
          price_year: this.pretAn,
          id: this.id

        };
            
            axiosAuth.post(`/user/post`, chirie )
            .then(response => console.log(response))
            .catch(error => console.log(error));
          
      
    },
  
  
  }
};
</script>

<style>



</style>