import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/home/Home.vue'
import Login from '../views/login/Login.vue'
import Details from '../views/details/Details.vue'
import TariffPlans from "@/views/tariffPlans/TariffPlans";

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/details',
        name: 'Details',
        component: Details
    },
    {
        path: '/tariff-plans',
        name: 'TariffPlans',
        component: TariffPlans
    }
]
const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})
export default router