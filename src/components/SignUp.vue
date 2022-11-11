<template>
  <NavHeader/>
  <img id="logo" alt="Vue logo" src="../assets/logo.png">
  <h1>Sign up</h1>

  <div class="register">
    <input type="text" v-model="name" name="Full name" placeholder="Full name"/>
    <input type="email" v-model="email" name="Email" placeholder="Email" required/>
    <input type="password" v-model="password" name="Password" placeholder="Password" required/>
    <button v-on:click="register">Sign up</button>
  </div>
</template>

<script>
  import Axios from 'axios'
  import NavHeader from "@/components/NavHeader";

  export default {
    name: 'SignUp',
    components: {NavHeader},
    data() {
      return {
        name: '',
        email: '',
        password: ''
      }
    },

    methods: {
      async register() {
        let result = await Axios.post("http://localhost:3000/users", {
          email: this.email,
          password: this.password,
          name: this.name
        });

        console.warn(result);

        if(result.status == 201) {
          localStorage.setItem("user-info", JSON.stringify(result.data));
          await this.$router.push({name: 'HomePage'});
        }
      }
    },

    //lifecycle method
    mounted() {
      /*let user = localStorage.getItem("user-info");

      if(user) {
        this.$router.push({name: 'HomePage'});
      }*/
    }
  }
</script>

<style>
  #logo {
    width: 100px;
  }
</style>