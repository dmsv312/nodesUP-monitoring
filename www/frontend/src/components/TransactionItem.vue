<template>
  <div class="details-item"
  :class="transactionClass">
    <span class="date">{{ date }}</span>
    <span class="amount">{{ amount }}</span>
    <p>{{ description }}</p>
  </div>
</template>

<script>

export default {
  name: "transaction-item",
  props: {
    //TODO: remade type class
    type: String,
    date: String,
    //TODO: find out about +-
    amount: String,
    description: String,
  },
  computed: {
    transactionClass() {
      return this.type;
    }
  }
}
</script>

<style scoped>

</style>