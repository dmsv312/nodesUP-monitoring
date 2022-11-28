import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/home/Home.vue'
import Login from '../views/login/Login.vue'
import Details from '../views/details/Details.vue'
import Rates from "@/views/rates/RatesItems";

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
        path: '/rates',
        name: 'RatesItems',
        component: Rates
    }
]
const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})
export default router