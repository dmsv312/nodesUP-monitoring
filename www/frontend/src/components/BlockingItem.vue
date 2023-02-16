<template>
  <div class="service-item">
    <div class="content">
      <h3>Добровольная блокировка</h3>
      <p>Приостановите списание абонентской платы на то время, когда вы не пользуетесь интернетом</p>
    </div>
    <div class="status">
      <el-switch v-model="isActive" @change="activateBlocking" size="large" />
    </div>
  </div>
</template>

<script>
export default {
  name: "blocking-item",
  props: {
    blocking: {
      id: String,
      isActive: Boolean,
    }
  },
  methods: {
    activateBlocking() {
      let isActive = !this.isActive
      this.$emit('change', this.blocking, isActive);
    },
  },
  computed: {
    isActive() {
      return this.blocking.isActive
    }
  },
}
</script>

<style scoped>

</style>