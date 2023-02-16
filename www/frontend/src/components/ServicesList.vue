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
  </div>
</template>

<script>
// import ServiceItem from "@/components/ServiceItem";
import BlockingItem from "@/components/BlockingItem.vue";
import axios from "axios";
export default {
  name: 'services-list',
  components: {
    // ServiceItem,
    BlockingItem,
  },
  data() {
    return {
      // services: [],
      blocking: '',
    }
  },
  mounted() {
    // this.fetchContractServices();
    this.fetchBlocking();
  },
  methods: {
    // fetchContractServices() {
    //   axios.get('/api/v1/contract_services')
    //       .then(response => {
    //         this.services = response.data.data;
    //       }).catch(error => {
    //      console.log(error)
    //   });
    // },
    fetchBlocking() {
      axios.get('/api/v1/blocking')
          .then(response => {
            this.blocking = response.data.data
            console.log(this.blocking)
          }).catch(error => {
         console.log(error)
      });
    },
    changeBlocking(blocking, isActive) {
      blocking.isActive = isActive
      axios.put('/api/v1/blocking/' + blocking.id, blocking)
          .then(response => {
            console.log(response.data)
            this.fetchBlocking();
          })
          .catch(error => {
            console.log(error)
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
  }
}
</script>

<style scoped>

</style>
