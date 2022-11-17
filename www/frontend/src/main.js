import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import ElementPlus from 'element-plus'
import ruRu from 'element-plus/dist/locale/ru.min.mjs'
import './assets/styles/_colors.scss' // цветовая схема
import './assets/styles.scss' // общие стили
import 'element-plus/dist/index.css' // element-plus
import './assets/styles/element-plus.scss' // custom element-plus

const app = createApp(App)
app.use(ElementPlus, {
    locale: ruRu
})
app.use(router).mount('#app')
