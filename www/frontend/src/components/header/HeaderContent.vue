<template>
  <header>
    <div class="content">
      <router-link to="/" class="logo-link">
        <img src="../../assets/images/logo-white.svg" class="logo" alt="NSUNet">
      </router-link>
      <router-link to="/" class="notify-link">
        <img src="../../assets/images/notifications.svg" alt="notification">
      </router-link>
      <div class="language-choice">
        <span class="language" ref="languages" @click="isShowLanguages = !isShowLanguages">En</span>
        <div class="languages" v-if="isShowLanguages">
          <router-link to="/">Ру</router-link>
          <router-link to="/">En</router-link>
        </div>
      </div>
      <router-link to="/" class="user-link">
        <span>Константин Константинопольский</span>
      </router-link>
    </div>
  </header>
</template>

<script>
export default {
  name: "HeaderContent",
  props: {
    isShowLanguages: false
  }
}
</script>

<style scoped>
  header {
    height: 105px;
    background: #337AB7;
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
    color: #ffffff;
  }

  header a {
    color: #ffffff;
  }

  header .content {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    flex-wrap: nowrap;
  }
  .logo-link {
    margin-right: 25px;
  }
  .logo {
    width: 150px;
  }
  .notify-link {
    margin-left: auto;
    height: 20px;
  }
  .language-choice {
    margin-left: 33px;
    width: 40px;
  }
  .language-choice .language {
    font-weight: 700;
    display: flex;
    flex-wrap: nowrap;
    align-items: center;
    justify-content: space-between;
  }
  .language-choice .language:after {
    display: block;
    content: '';
    width: 10px;
    height: 10px;
    background: url("../../assets/images/arrow-white.svg") no-repeat center center;
    cursor: pointer;
    transform: rotate(90deg);
  }
  .language-choice .languages {
    position: absolute;
    border: 1px solid #fff;
    width: 40px;
    background: #FFFFFF;
    box-shadow: 0 6px 58px rgba(49, 49, 49, 0.4);
    border-radius: 17px;
    margin-left: -12px;
    padding: 5px 0;
  }
  .language-choice .languages a {
    display: block;
    color: #337AB7;
    text-align: center;
    font-weight: 700;
  }
  .user-link {
    margin-left: 24px;
    display: flex;
    flex-wrap: nowrap;
    align-items: center;
    justify-content: space-between;
    font-weight: 700;
    text-decoration: none;
  }
  .user-link:after {
    display: block;
    content: '';
    width: 10px;
    height: 10px;
    background: url("../../assets/images/arrow-white.svg") no-repeat center center;
    cursor: pointer;
    margin-left: 10px;
  }
  .user-link:focus, .user-link:hover {
    text-decoration: underline;
  }
</style>