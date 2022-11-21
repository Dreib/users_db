<template>
  <NavHeader/>
  <img id="logo" alt="Vue logo" src="../assets/logo.png">
  <h1>Login</h1>

  <div class="login">
    <input type="email" v-model="email" name="Email" placeholder="Email" required/>
    <input type="password" v-model="password" name="Password" placeholder="Password" required/>
    <button v-on:click="login">Login</button>
  </div>
</template>

<script>
  import Axios from 'axios'
  import NavHeader from "@/components/NavHeader";

  export default {
    name: 'LoginPage',
    components: {NavHeader},
    data() {
      return {
        email: '',
        password: ''
      }
    },

    methods: {
      async login() {
        let result = await Axios.get('http://localhost:3000/users?email=${this.email}&password=${this.password}')

        console.log(result);

        if(result.status === 200) {
          localStorage.setItem("user-info", JSON.stringify(result.data[0]));
          await this.$router.push({name: 'HomePage'});
        }
      }
    },

    //lifecycle method
    mounted() {
      let user = localStorage.getItem("user-info");

      if(user) {
        this.$router.push({name: 'HomePage'});
      }
    }
  }
</script>

<style>
  #logo {
    width: 100px;
    padding-top: 30px;
  }
</style>