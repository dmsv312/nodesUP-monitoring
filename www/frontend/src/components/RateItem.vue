<template>
  <div class="col">
    <div class="widget rate-card "
         :class="`rate-${index}`"
    >
      <h2>Тариф {{ rate.name }} </h2>
      <div class="description">
        <div class="content">
          <div class="amount">{{ rate.price }} ₽/Мес</div>
          <div class="speed">Интернет до <b>{{ rate.speed }} МБит/С</b></div>
          <div class="channels"><b>{{ rate.channels }}</b> каналов</div>
          <div class="hd-channels">Включает <b>{{ rate.hdChannels }} НD</b> каналов</div>
        </div>
        <div class="name">{{ rate.name }}</div>
      </div>
      <el-button type="white">Выбрать</el-button>
    </div>
  </div>
</template>

<script>

export default {
  props: {
    rate: {
      type: Object,
      required: true
    },
    index:{
      type: Number
    }
  }
}
</script>

<style scoped>
.col{
  display: flex;
  flex: 0 0 50%;
  max-width: 50%;
  padding:20px 20px;
}
.widget{
  display: flex;
  flex: 0 0 100%;
  height: 406px;
}
.rate-card h2{
  color: #fff;
}
@media (max-width:991px){
  .col{
    flex: 0 0 100%;
    max-width: 100%;
  }
}
</style>