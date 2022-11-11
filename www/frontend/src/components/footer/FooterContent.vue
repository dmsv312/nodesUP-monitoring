<template>
  <footer>
    <div class="content">
      <div class="logos">
        <a href="https://nsu.ru/n">
          NSU
        </a>
        <router-link to="/">
          <img src="../../assets/images/logo-white.svg" class="logo" alt="NSUNet">
        </router-link>
        <p class="copy">
          © 2021 Новосибирский государственный университет
        </p>
      </div>
      <div class="contacts">
        <h4>Контакты</h4>
        <p>630090, г. Новосибирск, ул. Пирогова,1, каб 4222</p>
        <p>+7 (383) 363-41-93</p>
        <p><a href="mailto:support@nsu.ru">support@nsu.ru</a></p>
      </div>
      <div class="socials">
        <h4>Мы в соцсетях</h4>
        <div class="icons">
          <a href="https://vk.com" target="_blank">VK</a>
        </div>
        <div class="service-rules">
          <router-link to="/">Правила оказания услуг связи</router-link>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "FooterContent"
}
</script>

<style scoped>

</style>