<template>
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-light  mt-2 pageStyle">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse float-md-left" id="navbarNavAltMarkup">
               <div class="navbar-nav mx-auto" style="width: 200px;">
                
                  <router-link to="/"><button :class=" buttonClass" >
                      Home 
                  </button></router-link>

                  <router-link to="/map"><button :class=" buttonClass" > 
                    Map  
                  </button></router-link>
                
                </div>
              <div class="navbar-nav lg-navbar-right">

                <router-link to="/login"><button :class=" buttonClass" > 
                    Login
                  </button></router-link>

                      <router-link to="/register" ><button :class=" buttonClass" > 
                    Sign Up
                  </button></router-link>

              </div>

            </div>
        </nav>
    </div>
</template>

<script>
export default {
    data(){
      return {  
        buttonClass: 'btn btn-info btnWidth mr-lg-2 mb-sm-2 mb-lg-0 mb-xs-2  '
        }
    }

};
</script>

<style scoped>

.navbarCustom{

margin-right: 25%;

}
.btnWidth{

  width: 90px;

}


</style>
