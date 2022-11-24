<template>
  <div class="widget balance">
    <h2>Мой баланс</h2>
    <p>
      Последнее пополнение баланса: <br>
      <span>{{ lastReplenishmentDate }}</span>
    </p>
    <div class="amount">{{ amount }}</div>
    <el-button type="primary">Пополнить</el-button>
  </div>
</template>

<script>
export default {
  name: "user-balance",
  props: {
    lastReplenishmentDate: String,
    amount: String,
  },
}
</script>

<style scoped>

</style>