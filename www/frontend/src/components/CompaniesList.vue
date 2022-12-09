<template>
  <div v-if="companies.length > 0">
    <company-item
        v-for="company in companies"
        :company="company"
        :key="company.id"
        @remove="$emit('remove', company)"
    />
  </div>
  <div v-else>
    <h2>No companies</h2>
  </div>
</template>

<script>
import CompanyItem from "@/components/CompanyItem";
export default {
  props: {
    companies: {
      type: Array,
      required: true
    },
  },
  components: {
    CompanyItem,
  },
  name: 'CompaniesList',
  emits: ['remove'],
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
