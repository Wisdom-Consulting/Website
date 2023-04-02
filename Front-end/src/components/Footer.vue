<script setup>
import { RouterLink } from 'vue-router'
import { useAuthStore } from '@/stores/Auth'
</script>

<template>
  <div class="flex bg-[#003333] w-full p-4 mt-10 justify-between align-center gap-2 text-xs md:text-lg">
    <img v-bind:src="'./src/assets/footer_logo.png'" class="md:h-full h-7 self-center" alt="">
    <RouterLink to="" class="text-white font-bold self-center">History</RouterLink>
    <RouterLink to="" class="text-white font-bold self-center">Academy</RouterLink>
    <RouterLink to="" class="text-white font-bold self-center">Contact</RouterLink>
    <RouterLink to="" class="text-white font-bold self-center">Privacy policy</RouterLink>
  </div>
</template>