<script setup>
import {useConsultancyStore} from "@/stores/Consultancy";

const consultancyStore = useConsultancyStore()
</script>

<template>
  <div class="flex flex-col md:flex-row gap-8 md:gap-1 mx-auto mt-5 max-w-7xl px-4 sm:px-6 lg:px-8 justify-center">
    <div id="filters" class="flex text-[#003333] text-sm text-center md:text-lg justify-between gap-4">
      <button type="button" @click="consultancyStore.filterArticles(1)" class="sm:w-[60px] md:w-[100px]" >Learn to save</button>
      <button type="button" @click="consultancyStore.filterArticles(2)" class="sm:w-[60px] md:w-[100px]" >Financing solutions</button>
      <button type="button" @click="consultancyStore.filterArticles(3)" class="sm:w-[60px] md:w-[100px]">Financial dictionary</button>
      <button type="button" @click="consultancyStore.filterArticles(4)" class="sm:w-[60px] md:w-[100px]">Learn to invest</button>
      <button type="button" @click="consultancyStore.filterArticles(5)" class="sm:w-[60px] md:w-[100px]">Financial services</button>
    </div>
    <div class="relative content-center align-center max-w-md self-center">
      <font-awesome-icon class="absolute text-[#003333] top-2 left-2 self-center max-w-md" icon="fa-solid fa-search"/>
      <input type="text"
             class="bg-[#DDDDDD] h-8 w-full pl-8 rounded-2xl border-none focus:outline-none hover:cursor-pointer"
             name="">
    </div>
  </div>
</template>