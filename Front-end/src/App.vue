<script setup>
import {RouterView, RouterLink} from 'vue-router'
import {onMounted} from "vue";
import { useAuthStore} from "@/stores/Auth";
import Navbar from "@/components/Navbar.vue";

const authStore = useAuthStore();

// onMounted (async () => {
//   await authStore.getUser();
// })
</script>

<template>
  <div>
    <p class="bg-blue-200">Sidatiiiiiiiiiiiiiiiiiiiiiii</p>
  </div>
  <navbar/>
  <router-link/>
</template>