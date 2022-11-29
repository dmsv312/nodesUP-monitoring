<template>
  <div class="widget services" v-if="services.length > 0">
    <h2>Мои услуги</h2>
    <p>Список подключенных и доступных услуг</p>
    <service-item
        v-for="service in services"
        :title="service.title"
        :description="service.description"
        :key="service.id"
    />
  </div>

  <div class="widget services" v-else>
    <h2>No services</h2>
  </div>
</template>

<script>
import ServiceItem from "@/components/ServiceItem";
export default {
  name: 'services-list',
  components: {
    ServiceItem,
  },
  props: {
    services: {
      type: Array,
      required: true
    },
  },
}
</script>

<style scoped>

</style>
