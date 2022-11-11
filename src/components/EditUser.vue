<template>
  <NavHeader/>
  <h1>Edit page</h1>

  <form class="edit">
    <input type="text" name="name" placeholder="Enter new full name" v-model="users.name"/>
    <input type="email" name="email" placeholder="Enter new email" v-model="users.email"/>
    <input type="password" name="password" placeholder="Enter new password" v-model="users.password"/>
    <input type="password" name="password" placeholder="Confirm new password" v-model="users.password"/>
    <button type="button" v-on:click="editUser">Edit user</button>
  </form>
</template>

<script>
 import NavHeader from "./NavHeader.vue";
 import Axios from 'axios';

 export default {
   name: 'EditUser',
   components: {
     NavHeader
   },

   data() {
     return {
       users: {
         name: '',
         email: '',
         password: ''
       }
     }
   },

   methods: {
     async editUser() {
       const result = await Axios.put('http://localhost:3000/users/' + this.$route.params.id, {
         name: this.users.name,
         email: this.users.email,
         password: this.users.password
       });

       if(result.status == 200) {
         await this.$router.push({name: 'HomePage'});
       }
     }
   },

   async mounted() {
     const result = await Axios.get('http://localhost:3000/users/' + this.$route.params.id)

     this.users = result.data;
   }
 }

</script>