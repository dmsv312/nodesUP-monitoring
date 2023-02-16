<template>
  <div class="widget blue rate-card">
    <h2>Мой тариф</h2>
    <div class="content">
      <div class="amount">{{ price }} ₽/Мес</div>
      <div class="speed">Интернет до <b>{{ speed }} МБит/С</b></div>
      <div class="channels"><b>{{ channels }}</b> каналов</div>
      <div class="hd-channels">Включает <b>{{ hdChannels }} НD</b> каналов</div>
    </div>
    <div class="symbol">{{ name }}</div>
    <el-button type="default">Сменить</el-button>
  </div>
</template>

<script>
export default {
  name: "rate-information",
  props: {
    price: Number,
    speed: String,
    channels: String,
    hdChannels: String,
    name: String,
  },
}
</script>

<style scoped>

</style>