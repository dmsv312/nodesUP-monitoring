<template>
  <div>
    <rate-item
       v-for="(rate, index) in rates"
       :rate="rate"
       :index="index"
       :key="rate.id"
    />
  </div>
</template>

<script>
import RateItem from "@/components/RateItem";
export default {
  name:"rate-list",
  components: {
    RateItem
  },
  props: {
    rates: {
      type: Array,
      required: true
    }
  }
}
</script>

<style scoped>

</style>