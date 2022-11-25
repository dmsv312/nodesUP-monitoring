<template>
  <router-view v-if="$store.state.isAuth"></router-view>
  <login-page v-else></login-page>
</template>

<script>
import axios from "axios";
import LoginPage from "@/views/login/LoginPage";

export default {
  name: 'App',
  components: {
    LoginPage,
  },
  mounted() {
    if (localStorage.token) {
      this.setToken();
    }
    this.getCsrf();
  },
  methods: {
    getCsrf() {
      axios.get('/api/v1/csrf').catch(error => {
        console.log(error)
      });
    },
    setToken() {
      this.$store.commit('setToken', localStorage.token);
      this.$store.commit('setIsAuth', true);
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$store.state.token;
    }
  }
}
</script>

<style>

</style>
