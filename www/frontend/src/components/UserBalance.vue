<template>
  <div class="widget balance">
    <h2>Мой баланс</h2>
    <p>
      Последнее пополнение баланса: <br>
      <span>{{ formattedLastReplenishmentDate }}</span>
    </p>
    <div class="amount">{{ formattedAmount }}</div>
    <div v-if="isBlocked">
      <p>Вы заблокированы!</p>
      <p>Сумма для возобновления услуг - {{ minimumPaymentAmount }}</p>
    </div>
    <div v-else>
      <p>Услуги действуют до {{ formattedBlockingDate }}</p>
      <p>Пополните счёт на {{ recommendedPaymentAmount }} ₽ чтобы избежать отключения</p>
    </div>
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
    isBlocked: Boolean,
    blockingDate: String,
    recommendedPaymentAmount: String,
    minimumPaymentAmount: String,
  },
  mixins: [formatDateMixin],
  computed: {
    formattedLastReplenishmentDate() {
      return this.formatDate(this.lastReplenishmentDate);
    },
    formattedAmount() {
      return this.amount.replace(/\./,',') + ' ₽';
    },
    formattedBlockingDate() {
      return this.formatDate(this.blockingDate)
    },
  }
}
</script>

<style scoped>

</style>