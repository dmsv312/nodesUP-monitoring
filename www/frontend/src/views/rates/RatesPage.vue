<template>
  <header-content
      :firstname="userProfile.firstname"
      :lastname="userProfile.lastname">
  </header-content>
  <div class="content">
    <div class="breadcrumbs">
      <el-breadcrumb separator="/">
        <el-breadcrumb-item :to="{ path: '/' }">Главная</el-breadcrumb-item>
        <el-breadcrumb-item>Тарифные планы</el-breadcrumb-item>
      </el-breadcrumb>
    </div>
    <h1>Тарифные планы</h1>
    <div class="dashboard">
      <rate-list
          :rates="rates"
      />
    </div>
  </div>
  <footer-content></footer-content>
</template>

<script>
import HeaderContent from "@/components/header/HeaderContent";
import FooterContent from "@/components/footer/FooterContent";
import RateList from "@/components/ReteList";
import axios from "axios";

export default {
  name: "rates-page",
  components: {
    FooterContent,
    HeaderContent,
    RateList,
  },
  mounted() {
    this.fetchUserProfile();
    this.getRates()
  },
  methods: {
    fetchUserProfile() {
      axios.get('/api/v1/user_profile')
          .then(response => {
            this.userProfile = response.data.data;
          }).catch(error => {
        console.log(error)
      });
    },
    getRates() {
      axios.get('/api/v1/rates')
          .then(response => {
            this.rates = response.data.data;
          }).catch(error => {
        console.log(error)
      });
    }
  },
  data() {
    return {
      userProfile: {
        contractNumber: 'NN 234-2412',
        firstname: '',
        lastname: '',
        middlename: '',
        address: '',
        email: '',
        phone: '',
      },
      rates: [],
    }
  }
}
</script>

<script setup>


</script>

<style lang="scss" scoped>
@import 'rates.scss';
</style>