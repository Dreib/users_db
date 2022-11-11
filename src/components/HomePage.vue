<template>
  <NavHeader/>
  <h1>Hello and welcome!</h1>

  <table id="table">
    <thead>
      <td>ID</td>
      <td>Name</td>
      <td>Email</td>
      <td>Actions</td>
    </thead>
    <tr v-for="item in users" :key="item.id">
      <td>{{item.id}}</td>
      <td>{{item.name}}</td>
      <td>{{item.email}}</td>
      <td>
        <router-link :to="'/edit/'+item.id">Edit user</router-link>
        <button v-on:click="deleteUser(item.id)">Delete</button>
      </td>
    </tr>
  </table>
</template>

<script>
  import NavHeader from './NavHeader.vue';
  import Axios from 'axios';

  export default {
    name: 'HomePage',

    data() {
      return {
        name: '',
        users: []
      }
    },

    /*data() {
      let user = localStorage.getItem("user-info");
      this.name = JSON.parse(user).name;

      return {
        name: ''
      }
    },*/

    components: {
      NavHeader
    },

    methods: {
      async deleteUser(id) {
        let result = await Axios.delete("http://localhost:3000/users/" + id);

        console.warn(result);

        if(result.status === 200) {
          await this.loadData();
        }
      },

      async loadData() {
        let result = await Axios.get("http://localhost:3000/users");

        this.users = result.data;
      }
    },

    async mounted() {
      //let user = localStorage.getItem("user-info");

      /*if(!user) {
        this.$router.push({name: 'Signup'});
      }*/
      await this.loadData();
    }
  }
</script>

<style>
  #table {
    border: 1px;
  }

  td {
    width: 160px;
    height: 40px;
  }
</style>
