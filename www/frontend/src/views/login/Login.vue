<template>
  <div class="login">
    <div class="logo-wrapper">
      <img src="../../assets/images/logo-white.svg" class="logo">
    </div>
    <div class="content-wrapper">
      <div class="content">
        <h1>Личный кабинет абонента</h1>
        <p>Чтобы войти в личный кабинет, введите номер договора и пароль.</p>
        <form action="" method="post">
          <div class="form-group">
            <label >Логин</label>
            <el-input type="text" class="w-100" v-model="username" placeholder="Введите логин" />
          </div>
          <div class="form-group">
            <label >Пароль</label>
            <el-input type="password" class="w-100" v-model="password" placeholder="Введите пароль" show-password />
          </div>
          <div class="form-buttons">
            <el-button type="primary">Войти</el-button>
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
import { ref } from 'vue'

export default {
  name: "Login",
  props: {
    username: String,
    password: String
  },
}
</script>

<style lang="scss" scoped>
  @import 'login.scss';
</style>