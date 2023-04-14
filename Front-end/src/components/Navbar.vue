<script setup>
import {RouterLink} from 'vue-router'
import {useAuthStore} from '@/stores/Auth'
import {Navbar, NavbarCollapse} from 'flowbite-vue'
import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue'
import {onMounted} from "vue";

const authStore = useAuthStore();
if (authStore.user === null) {
    await authStore.getUser();
}
// await authStore.getUser();
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
        path: '/consulting',
    },
    {
        name: 'Academy',
        path: '/academy',
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
        path: '/consulting',
    },
    {
        name: 'Academy',
        path: '/academy',
    },
]
const admin = [
    {
        name: 'sidati',
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
]
</script>

<template>
  <!--  <Suspense>-->
  <!--    <template #default>-->
    <Navbar>
        <template #logo>
            <RouterLink to="/" class="flex items-center">
                <img src="../assets/wisdom_logo.png" class="mr-3 h-16" alt="Flowbite Logo"/>
            </RouterLink>
            <Menu v-if="authStore.user" as="div" class="md:hidden ml-auto">
                <div>
                    <MenuButton
                            class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="sr-only">Open user menu</span>
                        <img v-if="!authStore.user.image" class="h-10 w-10 rounded-full"
                             src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                             alt=""/>
                        <img v-else class="h-9 w-9 rounded-full" :src="authStore.user.image" alt=""/>
                    </MenuButton>
                </div>
                <transition enter-active-class="transition ease-out duration-100"
                            enter-from-class="transform opacity-0 scale-95"
                            enter-to-class="transform opacity-100 scale-100"
                            leave-active-class="transition ease-in duration-75"
                            leave-from-class="transform opacity-100 scale-100"
                            leave-to-class="transform opacity-0 scale-95">
                    <MenuItems
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <!--            User name -->
                        <div class="px-4 py-3">
                            <p class="text-sm leading-5">{{ authStore.user.name }}</p>
                            <p class="text-sm font-medium leading-5 text-gray-900 truncate">{{
                                authStore.user.email
                                }}</p>
                        </div>
                        <MenuItem v-slot="{ active }">
                            <RouterLink to="/profile"
                                        :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
                                My Profile
                            </RouterLink>
                        </MenuItem>
                        <MenuItem v-slot="{ active }">
                            <RouterLink to="#"
                                        :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
                                Settings
                            </RouterLink>
                        </MenuItem>
                        <MenuItem v-slot="{ active }">
                            <button @click="authStore.logOut()"
                                    :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Sign
                                out
                            </button>
                        </MenuItem>
                    </MenuItems>
                </transition>
            </Menu>
            <RouterLink v-if="!authStore.user" to="/login"
                        class="md:hidden flex ml-auto text-white bg-[#003333] font-bold hover:bg-[#003333] focus:outline-none rounded-2xl text-md px-4 py-2 text-center mr-3 md:mr-0">
                Connect
            </RouterLink>

        </template>
        <template #default="{isShowMenu}" class="mx-auto">
            <NavbarCollapse :isShowMenu="isShowMenu">
                <RouterLink class="font-bold text-lg" v-if="!authStore.user" v-for="link in guest" :to="link.path">
                    {{ link.name }}
                </RouterLink>
                <RouterLink class="font-bold text-lg" v-if="authStore.user && authStore.role[0] === 'user'"
                            v-for="link in client" :to="link.path">
                    {{ link.name }}
                </RouterLink>
                <RouterLink class="font-bold text-lg" v-if="authStore.user && authStore.role[0] === 'admin'"
                            v-for="link in admin" :to="link.path">
                    {{ link.name }}
                </RouterLink>
                <RouterLink class="font-bold text-lg" v-if="authStore.user && authStore.role[0] === 'consultant'"
                            v-for="link in creator" :to="link.path">
                    {{ link.name }}
                </RouterLink>
            </NavbarCollapse>
        </template>
        <template #right-side>
            <RouterLink v-if="!authStore.user" to="/login" type="button"
                        class="text-white bg-[#003333] font-bold hover:bg-[#003333] focus:outline-none rounded-2xl text-md px-4 py-2 text-center mr-3 md:mr-0">
                Connect
            </RouterLink>
            <Menu v-else as="div" class="ml-auto">
                <div>
                    <MenuButton
                            class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="sr-only">Open user menu</span>
                        <img v-if="!authStore.user.image" class="h-10 w-10 rounded-full"
                             src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                             alt=""/>
                        <img v-else class="h-9 w-9 rounded-full" :src="authStore.user.image" alt=""/>
                    </MenuButton>
                </div>
                <transition enter-active-class="transition ease-out duration-100"
                            enter-from-class="transform opacity-0 scale-95"
                            enter-to-class="transform opacity-100 scale-100"
                            leave-active-class="transition ease-in duration-75"
                            leave-from-class="transform opacity-100 scale-100"
                            leave-to-class="transform opacity-0 scale-95">
                    <MenuItems
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <!--            User name -->
                        <div class="px-4 py-3">
                            <p class="text-sm leading-5">{{ authStore.user.name }}</p>
                            <p class="text-sm font-medium leading-5 text-gray-900 truncate">{{
                                authStore.user.email
                                }}</p>
                        </div>
                        <MenuItem v-slot="{ active }">
                            <RouterLink to="/profile"
                                        :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
                                My Profile
                            </RouterLink>
                        </MenuItem>
                        <MenuItem v-slot="{ active }">
                            <RouterLink to="#"
                                        :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
                                Settings
                            </RouterLink>
                        </MenuItem>
                        <MenuItem v-slot="{ active }">
                            <button @click="authStore.logOut()"
                                    :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Sign
                                out
                            </button>
                        </MenuItem>
                    </MenuItems>
                </transition>
            </Menu>
        </template>
    </Navbar>

</template>
