<template>

<div class="container">
    <form  @submit.prevent="onSubmit" class="form-horizontal" role="form">
     <div class="text-center">   
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Login</h2>
                <hr>
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
            <div class="col-md-3 field-label-responsive"> </div>
            
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
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success mb-3 bWidth">
                    <i class="fa fa-sign-in"></i>
                    Login </button>
            </div>
        </div>
     </div>
    </form>
    <vue-snotify></vue-snotify>
</div>

</template>

<script>
import globalMethods from '../../mixins/globalMethods';
import axios from '../../axios-auth'
export default {
     mixins:[globalMethods],
  data() {
    return {
      email: "",
      password: "",
      loginError:''
    };
  },

  methods: {
    onSubmit() {
      const vm = this
      const loginData = {
        email: this.email,
        password: this.password
      };

     axios.post('/user/login', loginData)
                .then(response => {
                    console.log(response.status)
                    if(response.status == 200){
                        localStorage.setItem('token', response.data.token)
                        this.$store.dispatch("authUserData");
                        this.$router.push({ name: "home" });
                    }
                })
                .catch(error => {
                   if(error){
                       this.error('Eroare' , 'Parola sau email gresit!')
                   }
                })
    }
    
  },
 

};
</script>

<style scoped>
@media (min-width: 768px) {
  .field-label-responsive {
    padding-top: 0.5rem;
    text-align: right;
  }
}
</style>