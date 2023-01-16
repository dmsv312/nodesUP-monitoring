<template>
  <div class="service-item">
    <div class="content">
      <h3>{{ service.name }}</h3>
      <p>{{ service.description }}</p>
    </div>
    <div class="status">
      <el-switch v-model="service.isActive" @change="activateService" size="large" />
    </div>
  </div>
</template>

<script>
export default {
  name: "service-item",
  props: {
    service: {
      name: String,
      description: String,
      isActive: Boolean,
    }
  },
  methods: {
    activateService() {
      this.$emit('change', this.service);
    },
  },
}
</script>

<style scoped>

</style>