<template>

    <div>
        <p>{{ phone }}</p>
        <p>{{ email }}</p>
       
    

    </div>

</template>

<script>
export default {
  data(){
      return{
        
      }
  },
  computed: {
      phone(){
      return  this.$store.state.userPhone 
      },
      email(){
          return this.$store.state.userEmail
      }
  }

}
</script>
