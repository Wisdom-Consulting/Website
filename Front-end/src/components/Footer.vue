<script setup>
import {RouterLink} from 'vue-router'</script>

<template>
  <div class="flex bg-[#003333] w-full p-4 mt-10 justify-around align-center gap-2 text-xs md:text-lg">
    <img v-bind:src="'./src/assets/footer_logo.png'" class="md:h-10 h-7 self-center" alt="">
    <div class="flex justify-around align-center gap-6 text-xs md:text-lg">
      <RouterLink to="" class="text-white self-center">History</RouterLink>
      <RouterLink to="" class="text-white self-center">Academy</RouterLink>
      <RouterLink to="" class="text-white self-center">Contact</RouterLink>
      <RouterLink to="" class="text-white self-center">Privacy policy</RouterLink>
    </div>
  </div>
</template>