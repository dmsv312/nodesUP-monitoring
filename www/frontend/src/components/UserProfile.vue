<template>
  <div class="widget widget-userprofile">
    <div>
      <img src="../assets/images/avatar.png" class="avatar" alt="avatar">
    </div>

    <h2>Мои учетные данные</h2>
    <div class="contract-number">
      {{ contractNumber }}
    </div>
    <br>
    <label>Фамилия</label>
    <p>{{ lastName }}</p>

    <label>Имя</label>
    <p>{{ firstName }}</p>

    <label>Отчество</label>
    <p>{{ middleName }}</p>

    <label>Адрес проживания</label>
    <p>{{ address }}</p>

    <label>E-mail</label>
    <p>{{ email}}</p>

    <label>Мобильный телефон</label>
    <p>{{ phone }}</p>
  </div>
</template>

<script>
export default {
  name: "user-profile",
  props: {
    contractNumber: String,
    firstName: String,
    lastName: String,
    middleName: String,
    address: String,
    email: String,
    phone: String,
  },
}
</script>

<style scoped lang="scss">

</style>