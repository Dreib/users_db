<template>
  <div class="nav">
    <router-link to="/">Home</router-link>
    <router-link to="/login">Login</router-link>
    <router-link to="/signup">Sign up</router-link>
    <a v-on:click="logout" href="#">Logout</a>
  </div>
</template>

<script>
  export default {
    name: 'NavHeader',

    methods: {
      logout() {
        localStorage.clear();
        this.$router.push({name:'LoginPage'});
      }
    }
  }
</script>

<style>
  .nav {
    background: #333333;
    overflow: hidden;
  }

  .nav a {
    float: left;
    color: #f2f2f2f2;
    padding: 14px 14px;
    text-align: center;
    font-size: 17px;
    text-decoration: none;
    margin-right: 5px;
  }

  .nav a:hover {
    background: #dddddd;
    color: #333333;
  }

</style>