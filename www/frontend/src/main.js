import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './assets/styles.scss' // общие стили

createApp(App).use(router).mount('#app')
