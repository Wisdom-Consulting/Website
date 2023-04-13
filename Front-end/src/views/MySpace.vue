<script setup>

import TestCards from "@/components/TestCards.vue";
import Missions from "@/components/Missions.vue";
import {onMounted} from "vue";
import SwiperCore, {A11y, Navigation, Pagination, Scrollbar} from 'swiper';
import {useMySpaceStore} from "@/stores/MySpace";
import {Swiper, SwiperSlide} from 'swiper/vue';
// Import Swiper styles
import 'swiper/css'
import 'swiper/css/navigation';
import 'swiper/css/pagination';

SwiperCore.use([Navigation, Pagination, Scrollbar, A11y]);

const mySpaceStore = useMySpaceStore();


onMounted(async () => {
  await mySpaceStore.getQuizzes()
  await mySpaceStore.getQuizFields()
})
</script>

<template>
  <TestCards/>
  <Missions/>
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 mt-10 max-w-6xl">
    <swiper class="flex justify-center"
            :modules="modules"
            :slides-per-view="3"
            :space-between="30"
            navigation
            :pagination="{ clickable: true }"
            @swiper="onSwiper"
            @slideChange="onSlideChange"
    >
      <swiper-slide v-for="quiz in mySpaceStore.quizzes">
        <div class="bg-white shadow-lg rounded-lg w-full h-fit p-2 md:p-6 flex flex-col gap-2 self-center">
          <div class="flex gap-2">
            <img v-bind:src="'./src/assets/eye.png'" class="w-5" alt="">
            <span class="text-[#003333] text-sm"> 5 min</span>
          </div>
          <div class="flex flex-row gap-2 text-center justify-center font-bold h-10 mb-1 text-xs md:text-sm">
            <h1 class="text-[#00333] text-md">{{quiz.title}}</h1>
          </div>
          <div class="flex flex-col gap-4 justify-center text-center">
            <h3 class="font-medium text-[15px] text-wrap text-[#003333] h-20 mb-1 hidden md:flex">{{quiz.body.slice(0,100)}}</h3>
          </div>
<!--          Pass quiz button-->
          <div class="flex flex-row gap-2 text-center justify-center mt-2">
            <button @click="mySpaceStore.clicked()" class="bg-[#003333] text-white text-sm font-bold py-2 px-4 rounded-full">Pass Quiz</button>
          </div>
          <div class="flex flex-row gap-2 text-center justify-center mt-2">
            <span class="text-[#003333] text-md font-bold">{{quiz.level.name}}</span>
          </div>
        </div>
      </swiper-slide>
    </swiper>
  </div>


</template>