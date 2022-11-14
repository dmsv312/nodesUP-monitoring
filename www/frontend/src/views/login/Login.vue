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
            <label for="username">Логин</label>
            <input type="text" class="w-100" v-model="username" id="username" placeholder="Введите логин">
          </div>
          <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="w-100" v-model="password" id="password" placeholder="Введите пароль">
          </div>
          <div class="form-buttons">
            <button class="btn btn-primary">Войти</button>
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
export default {
  name: "Login",
  props: {
    username: String,
    password: String
  }
}
</script>

<style lang="scss" scoped>
  @import 'login.scss';
</style>
<style lang="scss">
  @import '../../assets/styles/input-text.scss';
</style>