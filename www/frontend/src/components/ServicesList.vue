<template>
  <div class="widget services">
    <h2>Мои услуги</h2>
    <p>Список подключенных и доступных услуг</p>
    <service-item
        v-for="service in services"
        @change="activateService(service)"
        :service="service"
        :key="service.id"
    />
  </div>
</template>

<script>
import ServiceItem from "@/components/ServiceItem";
import axios from "axios";
export default {
  name: 'services-list',
  components: {
    ServiceItem,
  },
  data() {
    return {
      services: []
    }
  },
  mounted() {
    this.fetchContractServices();
  },
  methods: {
    fetchContractServices() {
      axios.get('/api/v1/contract_services')
          .then(response => {
            this.services = response.data.data;
          }).catch(() => {});
    },
    activateService(service) {
      console.log('activateService',service);
      axios.put('/api/v1/contract_services/' + service.id, service)
          .then(() => {
            this.fetchContractServices();
          })
          .catch(() => {});
    },
  }
}
</script>

<style scoped>

</style>
