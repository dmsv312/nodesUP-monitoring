<template>
  <header-content></header-content>
  <div class="content">
    <div class="breadcrumbs">
      <el-breadcrumb separator="/">
        <el-breadcrumb-item :to="{ path: '/' }">Главная</el-breadcrumb-item>
        <el-breadcrumb-item>Детализация</el-breadcrumb-item>
      </el-breadcrumb>
    </div>
    <h1>Детализация</h1>
    <div class="columns">
      <div class="content">
        <p>
          Внимание! 1-го числа каждого месяца производится закрытие предыдущего расчетного периода и формирование
          счетов на оплату услуг. Итоговые начисления и оплаты могут быть скорректированы.
        </p>
        <div class="contract_details">
          <table>
            <thead>
            <tr>
              <th class="date">Дата</th>
              <th class="description">Назначение платежа</th>
              <th class="amount">Сумма</th>
            </tr>
            </thead>
            <tbody>
            <transaction-row
                v-for="transaction in transactions"
                :type="transaction.type"
                :datetime="transaction.datetime"
                :amount="transaction.amount"
                :description="transaction.description"
                :key="transaction.id"
            />
            </tbody>
          </table>
        </div>
        <div class="load-more-button">
          <el-button type="primary" v-if="issetMoreDetails" @click="fetchTransactions">Загрузить еще</el-button>
        </div>
      </div>
      <div class="sidebar">
        <div class="widget">
          <h3>Выгрузить отчёт</h3>
          <p>Укажите период, за который Вам нужна детализация</p>
          <div>
            <my-calendar></my-calendar>
          </div>
          <div class="buttons">
            <el-button type="primary">Составить отчёт</el-button>
            <el-button type="default">Сохранить отчёт</el-button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer-content></footer-content>
</template>

<script>
import HeaderContent from "@/components/header/HeaderContent";
import FooterContent from "@/components/footer/FooterContent";
import axios from "axios";
import TransactionRow from "@/components/TransactionRow.vue";
import MyCalendar from "@/components/UI/MyCalendar.vue";

export default {
  name: "details-page",
  components: {MyCalendar, TransactionRow, FooterContent, HeaderContent},
  data() {
    return {
      transactions: [
        {
          amount : "",
          datetime : "",
          description : "",
          type: "default"
        },
        {
          amount : "",
          datetime : "",
          description : "",
          type: "default"
        },
        {
          amount : "",
          datetime : "",
          description : "",
          type: "default"
        },
        {
          amount : "",
          datetime : "",
          description : "",
          type: "default"
        },
      ],
      page: 0,
      issetMoreDetails: false,
    };
  },
  mounted() {
    this.fetchTransactions();
  },
  methods: {
    fetchTransactions() {
      console.log('page', this.page);
      axios.get('/api/v1/contract_details?page=' + (this.page + 1))
          .then(response => {
            this.page = response.data.meta.current_page;
            this.issetMoreDetails = response.data.meta.current_page < response.data.meta.last_page;
            if (this.page === 1) {
              this.transactions = response.data.data;
            } else {
              response.data.data.forEach(item => {
                this.transactions.push(item);
              });
            }
          }).catch(error => {
          console.log(error)
      });
    },
  }
}
</script>

<style lang="scss">
@import 'details/details.scss';
</style>