<template>
  <div class="widget blue rate-card">
    <h2>Мой тариф</h2>
    <div class="content">
      <div class="amount">{{ amount }} ₽/Мес</div>
      <div class="speed">Интернет до <b>{{ speed }} МБит/С</b></div>
      <div class="channels"><b>{{ channels }}</b> каналов</div>
      <div class="hd-channels">Включает <b>{{ hdChannels }} НD</b> каналов</div>
    </div>
    <div class="symbol">{{ symbol }}</div>
    <el-button type="default">Сменить</el-button>
  </div>
</template>

<script>
export default {
  name: "rate-information",
  props: {
    amount: String,
    speed: String,
    channels: String,
    hdChannels: String,
    symbol: String,
  },
}
</script>

<style scoped>

</style>