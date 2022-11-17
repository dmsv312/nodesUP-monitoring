<template>
  <header-content></header-content>
  <div class="content">
    <div class="breadcrumbs">
      С возвращением, Константин!
    </div>
    <h1>Личный кабинет</h1>
    <div class="dashboard">
      <div class="left-content">
        <div class="widget">
          <div>
            <img src="../../assets/images/avatar.png" class="avatar" alt="avatar">
          </div>

          <h2>Мои учетные данные</h2>
          <div class="contract-number">УИ-25/112563</div>
          <br>
          <label>Фамилия</label>
          <p>Константинопольский</p>

          <label>Имя</label>
          <p>Константин</p>

          <label>Отчество</label>
          <p>Константинович</p>

          <label>Адрес проживания</label>
          <p>ул. Пирогова, 10, 313</p>

          <label>E-mail</label>
          <p>evanyates@gmail.com</p>

          <label>Мобильный телефон</label>
          <p>8 953 456 78 95</p>
        </div>
        <div class="widget blue need-help">
          <h2>Нужна помощь?</h2>
          <p>Отправьте запрос в техническую поддержку NSUNet</p>
          <el-button type="white">Написать</el-button>
        </div>
      </div>
      <div class="content">
        <div>
          <div class="widget blue rate-card">
            <h2>Мой тариф</h2>
            <div class="content">
              <div class="amount">490 ₽/Мес</div>
              <div class="speed">Интернет до <b>20 МБит/С</b></div>
              <div class="channels"><b>86</b> каналов</div>
              <div class="hd-channels">Включает <b>20 НD</b> каналов</div>
            </div>
            <div class="symbol">C</div>
            <el-button type="white">Сменить</el-button>
          </div>
        </div>
        <div>
          <div class="widget balance">
            <h2>Мой баланс</h2>
            <p>
              Последнее пополнение баланса: <br>
              <span>15.04.2021 г.</span>
            </p>
            <div class="amount">100,95 ₽</div>
            <el-button type="primary">Пополнить</el-button>
          </div>
        </div>
        <div>
          <div class="widget services">
            <h2>Мои услуги</h2>
            <p>Список подключенных и доступных услуг</p>
            <div class="service-item">
              <div class="content">
                <h3>Автоплатеж</h3>
                <p>Автоматическое пополнение счета при отрицательном балансе</p>
              </div>
              <div class="status">
                <el-switch v-model="auto_payment" size="large" />
              </div>
            </div>
            <div class="service-item">
              <div class="content">
                <h3>Отложенный платеж</h3>
                <p>Пользуйтесь интернетом при отрицательном балансе, а платите потом</p>
              </div>
              <div class="status">
                <el-switch v-model="deferred_payment" size="large" />
              </div>
            </div>
            <div class="service-item">
              <div class="content">
                <h3>Добровольная блокировка</h3>
                <p>Приостановите списание абонентской платы на то время, когда вы не пользуетесь интернетом</p>
              </div>
              <div class="status">
                <el-switch v-model="voluntary_blocking" size="large" />
              </div>
            </div>
            <div class="service-item">
              <div class="content">
                <h3>Белый IP-адрес</h3>
                <p>Приостановите списание абонентской платы на то время, когда вы не пользуетесь интернетом</p>
              </div>
              <div class="status">
                <el-switch v-model="ip_address" size="large" />
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="widget details">
            <h2>Детализация</h2>
            <div>
              <p>
                Последнее пополнение баланса: <br>
                <span>15.04.2021 г.</span>
              </p>
              <div class="details-item decrease">
                <span class="date">01.04.2021</span>
                <span class="amount">- 236₽</span>
                <p>Услуга из D+: трафик (590₽)</p>
              </div>
              <div class="details-item addition">
                <span class="date">25.03.2021</span>
                <span class="amount">+ 236₽</span>
                <p>Зачисление платежа</p>
              </div>
              <div class="details-item decrease">
                <span class="date">01.04.2021</span>
                <span class="amount">- 236₽</span>
                <p>Услуга из D+: трафик (590₽)</p>
              </div>
              <div class="details-item addition">
                <span class="date">25.03.2021</span>
                <span class="amount">+ 236₽</span>
                <p>Зачисление платежа</p>
              </div>
            </div>
            <router-link to="/" class="more-link">Смотреть все</router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer-content></footer-content>
</template>

<script setup>

</script>
<script>
import HeaderContent from "@/components/header/HeaderContent";
import FooterContent from "@/components/footer/FooterContent";

export default {
  name: "Home",
  components: {FooterContent, HeaderContent},
  props: {
    auto_payment: Boolean,
    deferred_payment: Boolean,
    voluntary_blocking: Boolean,
    ip_address: Boolean
  }
}
</script>

<style lang="scss" scoped>
  @import 'home.scss';
  @import '../../assets/styles/rate-card';
</style>
