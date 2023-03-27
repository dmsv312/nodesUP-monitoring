<template>
  <div class="service-item">
    <div class="content">
      <h3>Обещанный платёж</h3>
      <p>Пользуйтесь интернетом при отрицательном балансе, а платите потом</p>
    </div>
    <div class="status">
      <el-switch :disabled="!promisePay.isAvailable" v-model="isActive" @change="activatePromisePay" size="large" />
    </div>
  </div>
</template>

<script>

export default {
  name: "promise-pay-item",
  props: {
    promisePay: {
      id: String,
      isActive: Boolean,
      isAvailable: Boolean,
    }
  },
  methods: {
    activatePromisePay() {
      let isActive = !this.isActive
      this.$emit('change', this.promisePay, isActive);
    },
  },
  computed: {
    isActive() {
      return this.promisePay.isActive
    }
  },
}
</script>

<style scoped>

</style>