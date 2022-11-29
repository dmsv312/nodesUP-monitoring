<template>
  <form @submit.prevent>
    <input v-model="company.name" type="text" placeholder="Name">
    <input v-model="company.email" type="text" placeholder="Email">
    <my-button style="align-self: flex-end" @click="createCompany">Create</my-button>
    <my-button style="align-self: flex-end" @click="updateCompany">Update</my-button>
  </form>
</template>

<script>
export default {
  data() {
    return {
      company: {
        name: '',
        email: '',
      }
    };
  },
  methods: {
    createCompany() {
      this.$emit('create', this.company);
      this.company = {
        name: '',
        email: '',
      };
    },
    updateCompany() {
      this.$emit('update', this.company)
      this.company = {
        name: '',
        email: '',
      };
    }
  },
  name: "CompanyForm"
}
</script>

<style scoped>
form {
  display: flex;
  flex-direction: column;
}
.input {
  width: 100%;
  border: 1px solid teal;
  padding: 10px 15px;
  margin-top: 15px;
}
</style>