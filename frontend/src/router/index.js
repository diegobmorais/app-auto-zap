import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '../stores/auth'


import AdminDashboard from '../admin/pages/AdminDashboard.vue'
import AdminCustomers from '../admin/pages/AdminCustomers.vue'
import AdminOrders from '../admin/pages/AdminOrders.vue'
import AdminPlans from '../admin/pages/AdminPlans.vue'
import AdminSettings from '../admin/pages/AdminSettings.vue'
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
    component: Login,
    meta: {
      requiresGuest: true
    }
  },

  {
    path: '/admin',
    meta: {
      requiresAuth: true,
      adminOnly: true
    },
    children: [
      {
        path: '',
        name: 'admin.dashboard',
        component: AdminDashboard
      },
      {
        path: 'customers',
        name: 'admin.users',
        component: AdminCustomers
      },
      {
        path: 'orders',
        name: 'admin.orders',
        component: AdminOrders
      },
      {
        path: 'plans',
        name: 'admin.plans',
        component: AdminPlans
      },
      {
        path: 'settings',
        name: 'admin.settings',
        component: AdminSettings
      },
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

// Guards
router.beforeEach(async (to, from, next) => {
  const auth = useAuthStore();

  // Se o usuário ainda não foi inicializado, busca os dados
  if (!auth.initialized) {
    await auth.init();
  }

  // Se a rota exige autenticação
  if (to.meta.requiresAuth) {
    if (!auth.user) {
      // Usuário não está logado → redireciona para login
      return next({ path: '/login', query: { redirect: to.fullPath } });
    }

    // Se a rota exige admin e o usuário não é admin → bloqueia
    if (to.meta.adminOnly && !auth.isAdmin) {
      return next('/client');
    }
  }

  // Se a rota exige convidado e o usuário já está logado → redireciona
  if (to.meta.requiresGuest && auth.user) {
    if (auth.isAdmin) {
      return next('/admin');
    } else {
      return next('/client');
    }
  }

  // Se passou por todas as verificações → segue normalmente
  next();
});
export default router
