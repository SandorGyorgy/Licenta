<template>

    <div>
        <p>{{ phone }}</p>
        <p>{{ email }}</p>

            <img :src="profilePic"  class="rounded-circle" height="180" width="180">
       
    

    </div>

</template>

<script>
export default {
  data() {
    return {
      profilePic: this.$store.state.profilePic,
      phone: this.$store.state.userPhone,
      email: this.$store.state.userEmail
    };
  },

};
</script>
