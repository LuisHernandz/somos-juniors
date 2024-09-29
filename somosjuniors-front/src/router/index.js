import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoginView from '@/views/LoginView.vue'
import RegisterView from '@/views/RegisterView.vue'
import UsersView from '@/views/Users/UsersView.vue'
import UserEdit from '@/views/Users/UserEdit.vue'
import UserShow from '@/views/Users/UserShow.vue'
import auth from '@/middleware/auth'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/acceso',
    name: 'login',
    component: LoginView
  },
  {
    path: '/registro',
    name: 'register',
    component: RegisterView
  },
  {
    path: '/usuarios',
    name: 'users',
    component: UsersView,
    beforeEnter: auth
  },
  {
    path: '/editU/:id',
    name: 'editU',
    component: UserEdit,
    beforeEnter: auth
  },
  {
    path: '/showU/:id',
    name: 'showU',
    component: UserShow,
    beforeEnter: auth
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
