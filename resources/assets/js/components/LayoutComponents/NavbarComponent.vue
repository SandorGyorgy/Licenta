<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light  mt-2 pageStyle">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
               <div class="navbar-nav mx-auto" >
                
                  <router-link to="/"><button :class=" buttonClass" >
                      Home 
                  </button></router-link>

                  <router-link to="/map"><button :class=" buttonClass" > 
                    Map  
                  </button></router-link>
                
                </div>
              <div class="navbar-nav lg-navbar-right">

                <router-link to="/login" v-if="!auth"><button :class=" buttonClass" > 
                    Login
                  </button></router-link>

                      <router-link to="/register"  v-if="!auth" ><button :class=" buttonClass" > 
                    Sign Up
                  </button></router-link>


                <div class="dropdown" v-if="auth">
                <button type="button" class="btn btn-info dropdown-toggle" id="accountButton"  data-toggle="dropdown">
                  {{ userName }}
                </button>

                <div class="dropdown-menu text-left">

                <router-link to="/user/post" >
                  <button class="dropdown-item"> 
                    <i class=" fa-plus-circle" :class="dropdownIcons"></i> 
                    Adauga Anunt
                  </button>
                </router-link>

                <router-link to="/user/posts" >
                  <button class="dropdown-item">
                     <i class=" fa-map-marker " :class="dropdownIcons"></i> 
                     Anunturile Mele
                     </button>
                </router-link>
                <router-link to="/user/messages" >
                  <button class="dropdown-item"> 
                    <i class=" fa-envelope" :class="dropdownIcons"></i>
                    Mesaje
                    </button>
                </router-link>

                <router-link to="/user/account" >
                  <button class="dropdown-item"> 
                    <i class=" fa-cog" :class="dropdownIcons"></i> 
                    Setari Cont
                    </button>
                </router-link>
                  <button @click="logOut" class="dropdown-item"> 
                    <i class=" fa-power-off" :class="dropdownIcons"></i> 
                    Delogare
                    </button>
                 
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
    },
    computed: {
        auth(){
          return this.$store.getters.isAuth
        },

        userName(){
          return this.$store.state.userName
        }


    },
    methods:{
      logOut(){
        this.$store.dispatch('logOut')
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
a{
 
 text-decoration: none;
}


</style>
