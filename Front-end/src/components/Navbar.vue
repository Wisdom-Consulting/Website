<script setup>
import { RouterLink} from 'vue-router'
import { useAuthStore } from '@/stores/Auth'
import { Dropdown, ListGroup, ListGroupItem } from 'flowbite-vue'

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

      <nav class="bg-white border-gray-200 ">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
          <RouterLink to="/"  class="flex items-center">
            <img src="../assets/wisdom_logo.png" class="mr-3 h-16" alt="Flowbite Logo" />
          </RouterLink>
          <div class="flex md:order-2">
            <RouterLink to="/login" type="button" class="text-white bg-[#003333] font-bold hover:bg-[#003333] focus:outline-none rounded-2xl text-md px-4 py-2 text-center mr-3 md:mr-0">
              Connect
            </RouterLink>
            <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-cta" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>
          </div>
          <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul class="flex flex-col gap-6 font-bold text-[#003333] p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
              <RouterLink v-if="authStore.user === null" v-for="link in guest" to="{{link.path}}">{{ link.name }}</RouterLink>
<!--              <RouterLink v_else v-for="link in guest" to="{{link.path}}">{{ link.name }}</RouterLink>-->
              <RouterLink v-if="authStore.user" v-for="link in client" to="{{link.path}}">{{ link.name }}</RouterLink>
<!--              <RouterLink v-if="authStore.user.ID === 2" v-for="link in creator" to="{{link.path}}">{{ link.name }}</RouterLink>-->
<!--              <RouterLink v-if="authStore.user.ID === 0" v-for="link in admin" to="{{link.path}}">{{ link.name }}</RouterLink>-->
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
</template>
