import { createRouter, createWebHistory } from 'vue-router'
import HomePage from '../views/home/HomePage.vue'
import LoginPage from '../views/login/LoginPage.vue'
import DetailsPage from '@/pages/DetailsPage'
import CompanyPage from "@/pages/CompanyPage";
import CompanyDetail from "@/components/CompanyDetail";
import RatesPage from "@/views/rates/RatesPage";
import MigrateInfo from "@/views/migrate/MigrateInfo.vue";
import RestoreLoginPage from "@/views/login/RestoreLoginPage.vue";

const routes = [
    {
        path: '/',
        name: 'home',
        component: HomePage
    },
    {
        path: '/login',
        name: 'login',
        component: LoginPage
    },
    {
        path: '/restore',
        name: 'restore',
        component: RestoreLoginPage,
    },
    {
        path: '/details',
        name: 'details',
        component: DetailsPage
    },
    {
        path: '/companies',
        name: 'companies',
        component: CompanyPage
    },
    {
        path: '/companies/:id',
        component: CompanyDetail
    },
    {
        path: '/rates',
        component: RatesPage
    },
    {
        path: '/migrate',
        name: 'migrate',
        component: MigrateInfo,
    },
]
const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})
export default router