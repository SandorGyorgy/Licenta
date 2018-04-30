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


                <div class="dropdown" v-if="logedIn">
                <button type="button" class="btn btn-info dropdown-toggle" id="accountButton"  data-toggle="dropdown">
                  Contul Meu
                </button>

                <div class="dropdown-menu text-left">
                  <a class="dropdown-item" href="#"> 
                    <i class=" fa-plus-circle" :class="dropdownIcons"></i> 
                    Adauga Anunt
                  </a>

                  <a class="dropdown-item" href="#">
                     <i class=" fa-map-marker " :class="dropdownIcons"></i> 
                     Anunturile Mele
                     </a>

                  <a class="dropdown-item" href="#"> 
                    <i class=" fa-envelope" :class="dropdownIcons"></i>
                    Mesaje
                    </a>

                  <a class="dropdown-item" href="#"> 
                    <i class=" fa-cog" :class="dropdownIcons"></i> 
                    Setari Cont
                    </a>

                  <a class="dropdown-item" href="#"> 
                    <i class=" fa-home" :class="dropdownIcons"></i> 
                    Delogare
                    </a>
                 
                </div>
              </div>



              </div>

            </div>
        </nav>
    </div>
</template>

<script>
export default {
    data(){
      return {  
        buttonClass: 'btn btn-info btnWidth mr-lg-2 mb-sm-2 mb-lg-0 mb-xs-2  ',
        logedIn: true ,
        dropdownIcons : ' fa mr-1 '
        }
    }

};
</script>

<style scoped>

.navbarCustom{

margin-right: 25%;

}
.btnWidth{

  width: 100px;

}
#accountButton{

    width: 130px;
}


</style>
