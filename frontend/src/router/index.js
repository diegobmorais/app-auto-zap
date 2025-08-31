import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/login/Login.vue'
import { useAuthStore } from '../stores/auth'
import Dashboard from '../pages/Dashboard.vue'

const routes = [
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/register',
        name: 'register',
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    const auth = useAuthStore()
    if (to.meta.requiresAuth && !auth.user) next('/login')
    else next()
})

export default router