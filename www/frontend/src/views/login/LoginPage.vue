<template>
  <div class="login">
    <div class="logo-wrapper">
      <img src="../../assets/images/logo-white.svg" class="logo">
    </div>
    <div class="content-wrapper">
      <div class="content">
        <h1>Личный кабинет абонента</h1>
        <p>Чтобы войти в личный кабинет, введите номер договора и пароль.</p>
        <form @submit.prevent>
          <div class="form-group">
            <label >Логин</label>
            <el-input type="text" class="w-100" v-model="username" placeholder="Введите логин" />
          </div>
          <div class="form-group">
            <label >Пароль</label>
            <el-input type="password" class="w-100" v-model="password" placeholder="Введите пароль" show-password />
          </div>
          <div class="form-buttons">
            <el-button type="primary" @click="login">Войти</el-button>
          </div>
          <div class="forgot-password">
            Забыли пароль? <router-link to="/">Восстановить</router-link>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "login-page",
  methods: {
    login() {
      axios.post('/api/v1/login', {
        email: this.username,
        password: this.password
      }).then(response => {
        console.log(response);
        this.setToken(response.data.token);
      }).catch(error => {
        console.log(error)
      });
    },
    setToken(token) {
      localStorage.token = token;
      this.$store.commit('setToken', localStorage.token);
      this.$store.commit('setIsAuth', true);
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$store.state.token;
    },

  },
  data() {
    return {
      username: '',
      password: '',
    };
  },
}
</script>

<style lang="scss" scoped>
  @import 'login.scss';
</style>