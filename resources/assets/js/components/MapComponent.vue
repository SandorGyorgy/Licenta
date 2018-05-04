<template>


  <div class=" map-page"  id="align">
            <div class="row">
            <div class="col-md-3"><h1> Map component </h1></div>
            <div class="col-md-"></div>
            <div class=" col-md-9">            
               <div id="myMap"  class="mapComponent"></div>
            </div>
            </div>
  </div>


</template>

<script>
export default {
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }},
  mounted: function initMap() {
            this.map = new google.maps.Map(document.getElementById('myMap'), {
            center: {lat:46.7712, lng: 23.6236},
            scrollwheel: false,
            zoom: 10
            })
  }

}
</script>
<style scoped>
    #myMap {
    height:400px;
    width: 500px;
    border: 1px black solid;
    margin: 2%;
   }

 .map-page{
   height: 850px;
   width: 1110px;

 }

  
</style>