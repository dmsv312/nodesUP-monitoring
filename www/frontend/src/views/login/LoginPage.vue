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
            Забыли пароль? <router-link to="/restore">Восстановить</router-link>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import popupMixin from "@/mixins/popupMixin";

export default {
  name: "login-page",
  methods: {
    login() {
      axios.post('/api/v1/login', {
        name: this.username,
        password: this.password
      }).then(response => {
        console.log(response);
        this.setTokenAndRole(response.data.token, response.data.role);
        if (response.data.role === 'admin') {
          this.$router.push({ name: 'migrate' });
        }
        if (response.data.role === 'user') {
          this.$router.push({ name: 'home' });
        }
      }).catch(error => {
        console.log(error);
        console.log(error.response.data.error);
        popupMixin.methods.show('Вход в кабинет', 'Неправильный логин или пароль, попробуйте ещё раз');
      });
    },
    setTokenAndRole(token, role) {
      localStorage.token = token;
      localStorage.role = role;
      this.$store.commit('setToken', localStorage.token);
      this.$store.commit('setIsAuth', true);
      this.$store.commit('setRole', role);
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