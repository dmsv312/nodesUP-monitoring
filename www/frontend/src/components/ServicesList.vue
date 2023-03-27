<template>
  <div class="widget services">
    <h2>Мои услуги</h2>
    <p>Список подключенных и доступных услуг</p>
<!--    <service-item-->
<!--        v-for="service in services"-->
<!--        @change="activateService(service)"-->
<!--        :service="service"-->
<!--        :key="service.id"-->
<!--    />-->
    <blocking-item
        :blocking = this.blocking
        @change = "changeBlocking"
    />
    <promise-pay-item
        :promise-pay = this.promisePay
        @change = "changePromisePay"
    />
  </div>
</template>

<script>
// import ServiceItem from "@/components/ServiceItem";
import BlockingItem from "@/components/BlockingItem.vue";
import PromisePayItem from "@/components/PromisePayItem.vue";
import axios from "axios";
import popupMixin from "@/mixins/popupMixin";

export default {
  name: 'services-list',
  components: {
    PromisePayItem,
    BlockingItem,
  },
  data() {
    return {
      // services: [],
      promisePay: '',
      blocking: '',
    }
  },
  mounted() {
    // this.fetchContractServices();
    this.fetchBlocking();
    this.fetchPromisePay();
  },
  methods: {
    fetchBlocking() {
      axios.get('/api/v1/blocking')
          .then(response => {
            this.blocking = response.data.data;
            console.log(this.blocking);
          }).catch(error => {
         console.log(error);
      });
    },
    changeBlocking(blocking, isActive) {
      blocking.isActive = isActive;
      axios.put('/api/v1/blocking/' + blocking.id, blocking)
          .then(response => {
            console.log(response.data);
            this.fetchBlocking();
            popupMixin.methods.show('Добровольная блокировка', 'Добровольная блокировка изменена');
          })
          .catch(error => {
            console.log(error);
            popupMixin.methods.show('Добровольная блокировка', 'Что-то пошло не так, попробуйте ещё раз');
          });
    },
    fetchPromisePay() {
      axios.get('/api/v1/promise_pay')
          .then(response => {
            this.promisePay = response.data.data
            console.log(this.promisePay)
          }).catch(error => {
        console.log(error)
      });
    },
    changePromisePay(promisePay, isActive) {
      promisePay.isActive = isActive
      axios.put('/api/v1/promise_pay/' + promisePay.id, promisePay)
          .then(response => {
            console.log(response.data)
            this.fetchPromisePay();
            popupMixin.methods.show('Обещанный платёж', 'Обещанный платёж подключён');
          })
          .catch(error => {
            console.log(error);
            popupMixin.methods.show('Обещанный платёж', 'ЧЧто-то пошло не так, попробуйте ещё раз');
          });
    },
    // activateService(service) {
    //   console.log('activateService',service);
    //   axios.put('/api/v1/contract_services/' + service.id, service)
    //       .then(response => {
    //         this.fetchContractServices();
    //       })
    //       .catch(error => {
    //          console.log(error)
    //       });
    // },
    // fetchContractServices() {
    //   axios.get('/api/v1/contract_services')
    //       .then(response => {
    //         this.services = response.data.data;
    //       }).catch(error => {
    //      console.log(error)
    //   });
    // },
  }
}
</script>

<style scoped>

</style>
