<template>
  <header-content
      :firstname="userProfile.firstname"
      :lastname="userProfile.lastname">
  </header-content>
  <div class="content">
    <div class="breadcrumbs">
      С возвращением, {{ userProfile.firstname }}!
    </div>
    <h1>Личный кабинет</h1>
    <div class="dashboard">
      <div class="left-content">
        <user-profile
            :contract-number="userProfile.contractNumber"
            :first-name="userProfile.firstname"
            :last-name="userProfile.lastname"
            :middle-name="userProfile.middlename"
            :address="userProfile.address"
            :email="userProfile.email"
            :phone="userProfile.phone">
        </user-profile>

        <div class="widget blue need-help">
          <h2>Нужна помощь?</h2>
          <p>Отправьте запрос в техническую поддержку NSUNet</p>
          <el-button type="default">Написать</el-button>
        </div>
      </div>
      <div class="content">
        <div>
          <rate-information
              :price="rateInformation.price"
              :speed="rateInformation.speed"
              :channels="rateInformation.channels"
              :hd-channels="rateInformation.hdChannels"
              :name="rateInformation.name">
          </rate-information>
        </div>

        <div>
          <user-balance
              :last-replenishment-date="userBalance.lastReplenishmentDate"
              :amount="userBalance.amount"
              :is-blocked="userBalance.isBlocked"
              :blocking-date="userBalance.blockingDate"
              :recommended-payment-amount="userBalance.recommendedPaymentAmount"
              :minimum-payment-amount="userBalance.minimumPaymentAmount">
          </user-balance>
        </div>

        <div>
          <services-list />
        </div>

        <div>
          <account-transactions
              :transactions="transactions">
          </account-transactions>
        </div>

      </div>
    </div>
  </div>
  <footer-content></footer-content>
</template>

<script>
import HeaderContent from "@/components/header/HeaderContent";
import FooterContent from "@/components/footer/FooterContent";
import UserProfile from "@/components/UserProfile";
import UserBalance from "@/components/UserBalance";
import RateInformation from "@/components/RateInformation";
import ServicesList from "@/components/ServicesList";
import AccountTransactions from "@/components/AccountTransactions";
import axios from "axios";

export default {
  name: "home-page",
  components: {
    FooterContent,
    HeaderContent,
    UserProfile,
    UserBalance,
    RateInformation,
    ServicesList,
    AccountTransactions,
  },
  mounted() {
    this.fetchUserProfile();
    this.fetchRateInformation();
    this.fetchUserBalance();
    this.fetchLastTransactions();
  },
  methods: {
    fetchUserProfile() {
      axios.get('/api/v1/user_profile')
          .then(response => {
            this.userProfile = response.data.data
            console.log(response)
          }).catch(error => {
        console.log(error)
      });
    },
    fetchRateInformation() {
      axios.get('/api/v1/get_rate_by_user')
          .then(response => {
            this.rateInformation = response.data.data;
          }).catch(error => {
        console.log(error)
      });
    },
    fetchUserBalance() {
      axios.get('/api/v1/balance')
          .then(response => {
            console.log(response.data.data);
            this.userBalance = response.data.data;
          }).catch(error => {
        console.log(error)
      });
    },
    fetchLastTransactions() {
      axios.get('/api/v1/contract_details?on-page=4')
          .then(response => {
            this.transactions = response.data.data;
          }).catch(error => {
        console.log(error)
      });
    },
  },
  data() {
    return {
      userProfile: {
        contractNumber: '',
        firstname: '',
        lastname: '',
        middlename: '',
        address: '',
        email: '',
        phone: '',
      },
      userBalance: {
        lastReplenishmentDate: '',
        amount: '',
        isBlocked: false,
        blockingDate: '',
        recommendedPaymentAmount: '',
        minimumPaymentAmount: '',
      },
      rateInformation: {
        price: 0,
        speed: '',
        channels: '',
        hdChannels: '',
        name: '',
      },
      transactions: [
        {
          type: '',
          datetime: '',
          amount: '',
          description: '',
        },
      ]
    };
  },
}
</script>

<style lang="scss">
@import 'home.scss';
@import '../../assets/styles/rate-card';
</style>
