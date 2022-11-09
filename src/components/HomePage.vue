<template>
  <NavHeader/>
  <h1>Hello and welcome!</h1>
</template>

<script>
  import NavHeader from './NavHeader.vue';

  export default {
    name: 'HomePage',
    components: {
      NavHeader
    },

    /*mounted() {
      let user = localStorage.getItem("user-info");

      if(!user) {
        this.$router.push({name: 'Signup'});
      }
    }*/
  }
</script>
