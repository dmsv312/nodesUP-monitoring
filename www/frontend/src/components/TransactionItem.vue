<template>
  <div class="details-item" :class="transactionClass">
    <span class="date">{{ formattedTransactionDate }}</span>
    <span class="amount">{{ formattedTransactionCurrency }}</span>
    <p>{{ description }}</p>
  </div>
</template>

<script>

import formatDateMixin from "@/mixins/formatDateMixin";
import formatCurrency from "@/mixins/formatCurrency";

export default {
  name: "transaction-item",
  props: {
    type: String,
    datetime: String,
    amount: String,
    description: String,
  },
  mixins: [
      formatDateMixin,
      formatCurrency
  ],
  computed: {
    transactionClass() {
      return this.type;
    },
    formattedTransactionDate() {
      return this.formatDate(this.datetime);
    },
    formattedTransactionCurrency() {
      return this.formatCurrency(this.amount);
    }
  }
}
</script>

<style scoped>

</style>