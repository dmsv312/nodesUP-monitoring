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
              :amount="rateInformation.amount"
              :speed="rateInformation.speed"
              :channels="rateInformation.channels"
              :hd-channels="rateInformation.hdChannels"
              :symbol="rateInformation.symbol">
          </rate-information>
        </div>

        <div>
          <user-balance
              :last-replenishment-date="userBalance.lastReplenishmentDate"
              :amount="userBalance.amount">
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
    this.fetchUserBalance();
  },
  methods: {
    fetchUserProfile() {
      axios.get('/api/v1/user_profile')
        .then(response => {
          this.userProfile = response.data.data;
        }).catch(error => {
          // console.log(error)
        });
    },
    fetchUserBalance() {
      axios.get('/api/v1/user_balance')
        .then(response => {
          this.userBalance = response.data.data;
        }).catch(error => {
          // console.log(error)
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
      },
      rateInformation: {
        amount: '490',
        speed: '20',
        channels: '86',
        hdChannels: '20',
        symbol: 'C',
      },
      transactions: [
        {
          id: 1,
          type: 'decrease',
          date: '01.04.2021',
          amount: '- 236₽',
          description: 'Услуга из D+: трафик (590₽)',
        },
        {
          id: 2,
          type: 'addition',
          date: '25.03.2021',
          amount: '+ 236₽',
          description: 'Зачисление платежа',
        },
        {
          id: 3,
          type: 'decrease',
          date: '01.04.2021',
          amount: '- 236₽',
          description: 'Услуга из D+: трафик (590₽)',
        },
        {
          id: 4,
          type: 'addition',
          date: '25.03.2021',
          amount: '+ 236₽',
          description: 'Зачисление платежа',
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
