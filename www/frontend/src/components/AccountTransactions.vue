<template>
  <div class="widget details" v-if="transactions.length > 0">
    <h2>Детализация</h2>
    <div>
      <p>
        Последнее пополнение баланса: <br>
        <span>{{ lastReplenishmentDate }}</span>
      </p>

      <transaction-item
          v-for="transaction in transactions"
          :type="transaction.type"
          :datetime="transaction.datetime"
          :amount="transaction.amount"
          :description="transaction.description"
          :key="transaction.id"
      />
    </div>
    <router-link to="/details" class="more-link">Смотреть все</router-link>
  </div>

  <div class="widget details" v-else>
    <h2>No transactions</h2>
  </div>
</template>

<script>
import TransactionItem from "@/components/TransactionItem";
export default {
  name: 'account-transactions',
  components: {
    TransactionItem,
  },
  props: {
    transactions: {
      type: Array,
      required: true
    },
    lastReplenishmentDate: String,
  },
}
</script>

<style scoped>

</style>
