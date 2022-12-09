<template>
<div>
  <h1>Page for company with ID = {{ company.id }}</h1>
  <my-button @click="showDialog">Update Company</my-button>

  <my-dialog v-model:show="dialogVisible">
    <company-form @update="updateCompany">
    </company-form>
  </my-dialog>
  <div class="company">
    <div>
      <div><strong>Name: </strong>{{ company.name }}</div>
      <div><strong>Email: </strong>{{ company.email }}</div>
    </div>
  </div>
</div>
</template>

<script>
import axios from 'axios'
import companyForm from "@/components/CompanyForm";

export default {
  name: "company-detail",
  components: {
    companyForm
  },
  data() {
    return {
      company: Object,
      dialogVisible: false,
    };
  },
  mounted() {
    this.fetchCompanyDetail();
  },
  methods: {
    fetchCompanyDetail() {
      axios.get('/api/v1/companies/' + this.$route.params.id)
          .then(response => (this.company = response.data.data));
      console.log(this.company);
    },
    showDialog() {
      this.dialogVisible = true;
    },
    updateCompany(company) {
      axios.put('/api/v1/companies/' + this.company.id, company)
          .then(response => {
            this.fetchCompanyDetail();
            this.dialogVisible = false;
            console.log(response);
          })
          .catch(error => {
            console.log(error)
          });
    },
  }
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