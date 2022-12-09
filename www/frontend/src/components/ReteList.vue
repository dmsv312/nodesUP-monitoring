<template>
  <div>
    <div class="col">
      <div class="widget green rate-card">
        <h2>Тариф <span class="symbol-s">B</span></h2>
        <div class="content">
          <div class="amount">390 ₽/Мес</div>
          <div class="speed">Интернет до <b>10 МБит/С</b></div>
          <div class="channels"><b>150</b> каналов</div>
          <div class="hd-channels">Включает <b>40 НD</b> каналов</div>
        </div>
        <div class="symbol">B</div>
        <el-button type="white">Выбрать</el-button>
      </div>
    </div>
    <div class="col">
      <div class="widget green-d rate-card">
        <h2>Тариф <span class="symbol-s">C</span></h2>
        <div class="content">
          <div class="amount">490 ₽/Мес</div>
          <div class="speed">Интернет до <b>30 МБит/С</b></div>
          <div class="channels"><b>150</b> каналов</div>
          <div class="hd-channels">Включает <b>40 НD</b> каналов</div>
        </div>
        <div class="symbol">C</div>
        <el-button type="white">Выбрать</el-button>
      </div>
    </div>
    <div class="col">
      <div class="widget blue rate-card">
        <h2>Тариф <span class="symbol-s">D</span></h2>
        <div class="content">
          <div class="amount">590 ₽/Мес</div>
          <div class="speed">Интернет до <b>50 МБит/С</b></div>
          <div class="channels"><b>150</b> каналов</div>
          <div class="hd-channels">Включает <b>40 НD</b> каналов</div>
        </div>
        <div class="symbol d-symbol">D</div>
        <el-button type="white">Выбрать</el-button>
      </div>
    </div>
    <div class="col">
      <div class="widget violet rate-card">
        <h2>Тариф <span class="symbol-s">Z</span></h2>
        <div class="content">
          <div class="amount">690 ₽/Мес</div>
          <div class="speed">Интернет до <b>70 МБит/С</b></div>
          <div class="channels"><b>150</b> каналов</div>
          <div class="hd-channels">Включает <b>40 НD</b> каналов</div>
        </div>
        <div class="symbol">Z</div>
        <el-button type="white">Выбрать</el-button>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name:"RateList",
  components: {

  },
  props: {
    posts: {
      type: Array,
      required: true
    }
  }
}
</script>

<style scoped>

</style>