<script setup>
import { ref } from 'vue'
import {useConsultancyStore} from "@/stores/Consultancy";

const consultancyStore = useConsultancyStore()

</script>

<template>
  <div v-for="article in consultancyStore.content" class="flex flex-row flex-wrap gap-4 justify-center">
    <div class="bg-white shadow-lg rounded-lg w-[260px] h-fit p-6 flex flex-col gap-2">
      <div class="flex gap-2 justify-center">
        <span class="text-[#003333] text-sm">Sidati NOUHI</span>
      </div>
      <img :src="article.image ? article.image : './src/assets/consultant_male.png'" class="w-40 self-center" alt="">
      <div class="flex flex-col gap-4">
        <h3 class="font-medium text-[15px] text-wrap text-[#003333]">{{article.title}}</h3>
      </div>
    </div>
  </div>
</template>