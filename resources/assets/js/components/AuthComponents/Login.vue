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
</div>

</template>

<script>
export default {
  data() {
    return {
      email: "",
      password: ""
    };
  },

  methods: {
    onSubmit() {
      const loginData = {
        email: this.email,
        password: this.password
      };
      this.$store.dispatch("login", loginData);
      this.$router.push({ name: "home" });
    }
  }
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