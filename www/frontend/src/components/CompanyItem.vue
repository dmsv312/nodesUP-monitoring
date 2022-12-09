<template>
  <div class="company">
    <div>
      <div><strong>Name: </strong>{{ company.name }}</div>
      <div><strong>Email: </strong>{{ company.email }}</div>
    </div>
    <div class="company__buttons">
      <my-button @click="$emit('remove', company)">Delete</my-button>
      <my-button @click="$router.push('/companies/' + company.id)">Open</my-button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    company: {
      type: Object,
      required: true,
    }
  },
  name: "CompanyItem"
}
</script>

<style scoped>
.company {
  padding: 5px;
  border: 2px solid teal;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
</style>