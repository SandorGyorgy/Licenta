<template>


  <div class="pageStyle ">

      <div class="mapComponent text-center">

            <div id="myMap"></div>

      </div>
      
  </div>


</template>

<script>
export default {
  name: 'hello',
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
    width: 100%;
    border: 1px black solid;
   }

   .mapComponent{
        padding: 10px;
        width: 700px;
        
   }
</style>