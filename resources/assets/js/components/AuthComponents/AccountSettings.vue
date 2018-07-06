<template>
    <div>

      <div class="card m-2">
        <img :src="profilePic"  class="rounded-circle card-image" height="180" width="180">
        <h5 class="card-title" v-if="name">{{name}}</h5>
        <div class="card-body">test body</div>

      </div>
    
       
    
    </div>

</template>

<script>
export default {
  data() {
    return {
      profilePic: this.$store.state.profilePic,
      phone: this.$store.state.userPhone,
      email: this.$store.state.userEmail,
      name: this.$store.state.userName
    };
  },

};
</script>
