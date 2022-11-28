<template>
  <header-content></header-content>
  <div class="content">
    <div class="breadcrumbs">
      <el-breadcrumb separator="/">
        <el-breadcrumb-item :to="{ path: '/' }">Главная</el-breadcrumb-item>
        <el-breadcrumb-item>Тарифные планы</el-breadcrumb-item>
      </el-breadcrumb>
    </div>
    <h1>Тарифные планы</h1>
    <div class="dashboard">
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

    </div>
  </div>
  <footer-content></footer-content>
</template>

<script>
import HeaderContent from "@/components/header/HeaderContent";
import FooterContent from "@/components/footer/FooterContent";

export default {
  name: "RatesItems",
  components: {FooterContent, HeaderContent}
}
</script>

<script setup>


</script>

<style lang="scss" scoped>
@import 'rates.scss';
@import '../../assets/styles/rate-card';
</style>