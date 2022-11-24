<template>
  <div class="service-item">
    <div class="content">
      <h3>{{ title }}</h3>
      <p>{{ description }}</p>
    </div>
    <div class="status">
      <el-switch v-model="isActive" onclick="this.activateService()" size="large" />
    </div>
  </div>
</template>

<script>
export default {
  name: "service-item",
  props: {
    title: String,
    description: String,
  },
  data() {
    //TODO: move isActive to props
    return {
      isActive: false
    }
  },
  methods: {
    activateService() {
      //TODO: here will be method for activate or deactivate service
    },
  },
}
</script>

<style scoped>

</style>