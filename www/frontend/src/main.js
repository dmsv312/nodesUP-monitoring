import { createApp } from 'vue'
import ElementPlus from 'element-plus'
import App from './App.vue'
import router from './router'
import './assets/styles/_colors.scss' // цветовая схема
import './assets/styles.scss' // общие стили
import 'element-plus/dist/index.css' // element-plus
import './assets/styles/element-plus.scss' // custom element-plus

const app = createApp(App)
app.use(ElementPlus)
app.use(router).mount('#app')
