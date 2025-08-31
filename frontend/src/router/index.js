import { createRouter, createWebHistory } from 'vue-router'

import AdminLayout from '../admin/components/AdminLayout.vue'
import AdminDashboard from '../admin/views/AdminDashboard.vue'
import CustomerLayout from '../client/components/CustomerLayout.vue'
import LandingPage from '@/views/LandingPage.vue'
import Login from '@/views/Login.vue'



const routes = [
  // Rotas públicas
  {
    path: '/',
    name: 'landing',
    component: LandingPage
  },
  {
    path: '/login',
    name: 'login',
    component: Login
  },

  {
    path: '/admin',
    component: AdminLayout,
    children: [
      {
        path: '',
        name: 'admin.dashboard',
        component: AdminDashboard
      },
      // { path: 'users', name: 'admin.users', component: AdminUsers },
      // { path: 'settings', name: 'admin.settings', component: AdminSettings },
    ]
  },

  {
    path: '/client',
    component: CustomerLayout,
    children: [
    //   { path: '', name: 'client.dashboard', component: ClientDashboard },
    //   { path: 'profile', name: 'client.profile', component: ClientProfile },
    //   { path: 'orders', name: 'client.orders', component: ClientOrders },
    ]
  },

  // {
  //   path: '/:pathMatch(.*)*',
  //   name: 'not-found',
  //   component: NotFound
  // }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
