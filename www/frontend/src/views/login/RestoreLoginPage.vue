<template>
  <div class="login">
    <div class="logo-wrapper">
      <img src="../../assets/images/logo-white.svg" class="logo">
    </div>
    <div class="content-wrapper">
      <div class="content">
        <h1>Личный кабинет абонента</h1>
        <p>Чтобы восстановить пароль, введите номер договора. Далее на вашу электронную почту придёт письмо с кодом восстановления, которое необходимо будет ввести на следующем шаге.</p>
        <form @submit.prevent>
          <div v-if="this.step === 1">
            <div class="form-group">
              <label>Логин</label>
              <el-input type="text" class="w-100" v-model="username" placeholder="Введите логин" />
            </div>
            <div class="form-buttons">
              <el-button type="primary" @click="getCode">Далее</el-button>
            </div>
          </div>
          <div v-if="this.step === 2">
            <div class="form-group">
              <label>Код восстановления</label>
              <el-input type="text" class="w-100" v-model="restoreCode" placeholder="Введите код восстановления" />
            </div>
            <div class="form-group">
              <label>Новый пароль</label>
              <el-input type="text" class="w-100" v-model="newPassword" placeholder="Введите новый пароль" />
            </div>
            <div class="form-buttons">
              <el-button type="primary" @click="submitCode">Изменить пароль</el-button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "restore-page",
  methods: {
    getCode() {
      axios.post('/api/v1/restore_code', {
        name: this.username,
      }).then(response => {
        console.log(response);
        this.carbonUserId = response.data.result.uid;
        this.step = 2;
      }).catch(error => {
        console.log(error);
        console.log(error.response.data.error);
      });
    },
    submitCode() {
      axios.post('/api/v1/restore', {
        carbonUserId: this.carbonUserId,
        restoreCode: this.restoreCode,
        newPassword: this.newPassword,
      }).then(response => {
        console.log(response);
        this.$router.push({ name: 'login' });
        //TODO - notification about successful password change
      }).catch(error => {
        console.log(error);
        console.log(error.response.data.error);
      });
    },
  },
  data() {
    return {
      username: '',
      restoreCode: '',
      newPassword: '',
      step: 1,
      carbonUserId: '',
    };
  },
}
</script>

<style lang="scss" scoped>
  @import 'login.scss';
</style>