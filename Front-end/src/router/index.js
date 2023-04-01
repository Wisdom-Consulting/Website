import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Login from "../views/Login.vue";
import Signup from "@/views/Signup.vue";
import Academy from "../views/Academy.vue";
import Community from "@/views/Community.vue";
import MySpace from "@/views/MySpace.vue";
import Consulting from "@/views/Consulting.vue";
import Dashboard from "@/views/Dashboard.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
      path: '/signup',
      name: 'signup',
      component: Signup
    },
    {
      name: 'academy',
      path: '/academy',
      component: Academy
    },
    {
      name: 'Community',
      path: '/community',
      component: Community
    },
    {
      name: 'My Space',
      path: '/myspace',
      component: MySpace
    },
    {
      name: 'Consulting',
      path: '/consulting',
      component: Consulting
    },
    {
      name: 'Dashboard',
      path: '/dashboard',
      component: Dashboard
    },
    {
      name: 'Logout',
      path: '/logout',
    },
  ]
})

export default router
