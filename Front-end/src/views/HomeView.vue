<script setup>
import {RouterLink} from 'vue-router'
import CTA from "@/components/CTA.vue";
import Question from "@/components/Question.vue";
import Stats from "@/components/Stats.vue";
import WhyWisdom from "@/components/WhyWisdom.vue";
import WhatWisdom from "@/components/WhatWisdom.vue";
import HomeOpening from "@/components/HomeOpening.vue";
</script>

<template>
  <HomeOpening/>
  <WhatWisdom/>
  <div class="parent2 mt-20">
    <div class="card1 bg-[#003333] rounded-lg w-full h-[250px] p-6 flex flex-col gap-2">
      <div class="w-10 h-10 bg-[#DDDDDD]"></div>
      <div class="flex flex-col gap-4">
        <h1 class="font-bold text-[20px] text-wrap text-white">Manage your money</h1>
        <h3 class="font-medium text-[15px] text-wrap text-white">To prepare for your future and avoid the
          unexpected.</h3>
      </div>
    </div>
    <div class="card2 bg-[#DDDDDD] rounded-lg w-full h-[250px] p-6 flex flex-col gap-2">
      <div class="w-10 h-10 bg-[#003333]"></div>
      <div class="flex flex-col gap-4">
        <h1 class="font-bold text-[20px] text-wrap text-[#003333]">Choose your financial services</h1>
        <h3 class="font-medium text-[15px] text-wrap text-[#003333]">To prepare for your future and avoid the
          unexpected.</h3>
      </div>
    </div>
    <div class="card3 bg-[#DDDDDD] rounded-lg w-full h-[250px] p-6 flex flex-col gap-2">
      <div class="w-10 h-10 bg-[#003333]"></div>
      <div class="flex flex-col gap-4">
        <h1 class="font-bold text-[20px] text-wrap text-[#003333]">Finance your projects</h1>
        <h3 class="font-medium text-[15px] text-wrap text-[#003333]">To grow your savings and build your future.</h3>
      </div>
    </div>
    <div class="card4 bg-[#003333] rounded-lg w-full h-[250px] p-6 flex flex-col gap-2">
      <div class="w-10 h-10 bg-[#DDDDDD]"></div>
      <div class="flex flex-col gap-4">
        <h1 class="font-bold text-[20px] text-wrap text-white">Learn to invest...</h1>
        <h3 class="font-medium text-[15px] text-wrap text-white">To grow your savings and build your future.</h3>
      </div>
    </div>
    <div class="right flex flex-col my-auto">
      <h1 class="font-bold text-[45px] bg-black w-fit pr-2 text-wrap text-white">4 Missions</h1>
      <h1 class="font-extrabold text-[40px] text-wrap text-[#003333]">To scale up your financial competencies</h1>
      <div class="flex gap-4 w-full">
        <RouterLink to=""
                    class="btn px-4 py-2 bg-[#003333] border-[6px] border-[#003333] rounded-2xl text-white font-bold mt-10">
          Start NOW
        </RouterLink>
      </div>
    </div>
  </div>
  <WhyWisdom/>
  <Stats/>
  <Question/>
  <CTA/>
</template>
