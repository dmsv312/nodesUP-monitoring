import { createRouter, createWebHistory } from 'vue-router'
import HomePage from '../views/home/HomePage.vue'
import LoginPage from '../views/login/LoginPage.vue'
import DetailsPage from '../views/details/DetailsPage.vue'
import CompanyPage from "@/pages/CompanyPage";
import CompanyDetail from "@/components/CompanyDetail";

const routes = [
    {
        path: '/',
        name: 'Home',
        component: HomePage
    },
    {
        path: '/login',
        name: 'Login',
        component: LoginPage
    },
    {
        path: '/details',
        name: 'Details',
        component: DetailsPage
    },
    {
        path: '/companies',
        component: CompanyPage
    },
    {
        path: '/companies/:id',
        component: CompanyDetail
    },
]
const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})
export default router