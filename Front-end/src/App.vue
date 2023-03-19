<script setup>
import { RouterLink, RouterView } from 'vue-router'
import { useAuthStore } from '@/stores/Auth'

const authStore = useAuthStore()
const guest = [
  {
    name: 'History',
    path: '/',
  },
  {
    name: 'Mission',
    path: '/mission',
  },
  {
    name: 'Community',
    path: '/community',
  },
  {
    name: 'Academy',
    path: '/academy',
  },
  {
    name: 'Login',
    path: '/login',
  },
]
const client = [
  {
    name: 'Community',
    path: '/community',
  },
  {
    name: 'My Space',
    path: '/myspace',
  },
  {
    name: 'Consulting',
    path: '/contact',
  },
  {
    name: 'Academy',
    path: '/academy',
  },
  {
    name: 'Logout',
    path: '/logout',
  },
]
const creator = [
  {
    name: 'Community',
    path: '/community',
  },
  {
    name: 'My Space',
    path: '/myspace',
  },
  {
    name: 'Consulting',
    path: '/contact',
  },
  {
    name: 'Academy',
    path: '/academy',
  },
  {
    name: 'Logout',
    path: '/logout',
  },
]
const admin = [
  {
    name: 'Community',
    path: '/community',
  },
  {
    name: 'Dashboard',
    path: '/dashboard',
  },
  {
    name: 'Consulting',
    path: '/contact',
  },
  {
    name: 'Academy',
    path: '/academy',
  },
  {
    name: 'Logout',
    path: '/logout',
  },
]
</script>

<template>
  <header>
    <div class="wrapper">

      <nav>
        <RouterLink v-if="authStore.user === null" v-for="link in guest" to="{{link.path}}">{{ link.name }}</RouterLink>
        <RouterLink v-if="authStore.user.ID === 1" v-for="link in client" to="{{link.path}}">{{ link.name }}</RouterLink>
        <RouterLink v-if="authStore.user.ID === 2" v-for="link in creator" to="{{link.path}}">{{ link.name }}</RouterLink>
        <RouterLink v-if="authStore.user.ID === 0" v-for="link in admin" to="{{link.path}}">{{ link.name }}</RouterLink>
      </nav>
    </div>
  </header>
</template>
