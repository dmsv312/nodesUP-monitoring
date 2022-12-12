<template>
  <div class="widget balance">
    <h2>Мой баланс</h2>
    <p>
      Последнее пополнение баланса: <br>
      <span>{{ formattedLastReplenishmentDate }}</span>
    </p>
    <div class="amount">{{ amount }}</div>
    <el-button type="primary">Пополнить</el-button>
  </div>
</template>

<script>
import formatDateMixin from '../mixins/formatDateMixin.js';

export default {
  name: "user-balance",
  props: {
    lastReplenishmentDate: String,
    amount: String,
  },
  mixins: [formatDateMixin],
  computed: {
    formattedLastReplenishmentDate() {
      return this.formatDate(this.lastReplenishmentDate);
    }
  }
}
</script>

<style scoped>

</style>