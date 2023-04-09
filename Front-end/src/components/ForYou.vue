<script setup></script>

<template>
  <h1 class="mt-10 font-bold ml-10 text-[30px] text-wrap text-[#003333] flex mx-auto justify-start">Articles for
    you!</h1>
  <div class="flex flex-row flex-wrap gap-4 justify-center">
    <div class="bg-white shadow-lg rounded-lg w-[260px] h-fit p-6 flex flex-col gap-2">
      <div class="flex gap-2">
        <img v-bind:src="'./src/assets/eye.png'" class="w-5" alt="">
        <span class="text-[#003333] text-sm"> 5 min</span>
      </div>
      <img v-bind:src="'./src/assets/article.png'" alt="">
      <div class="flex flex-col gap-4">
        <h3 class="font-medium text-[15px] text-wrap text-[#003333]">Wisdom is an opportunity for us young people to
          develop our financial skills</h3>
      </div>
      <div class="flex flex-row gap-2 text-center">
        <h1 class="text-[#00333] text-sm">By</h1>
        <span class="text-[#003333] text-sm">Sidati NOUHI</span>
      </div>
    </div>
    <div class="bg-white shadow-lg rounded-lg w-[260px] h-fit p-6 flex flex-col gap-2">
      <div class="flex gap-2">
        <img v-bind:src="'./src/assets/eye.png'" class="w-5" alt="">
        <span class="text-[#003333] text-sm"> 5 min</span>
      </div>
      <img v-bind:src="'./src/assets/article.png'" alt="">
      <div class="flex flex-col gap-4">
        <h3 class="font-medium text-[15px] text-wrap text-[#003333]">Wisdom is an opportunity for us young people to
          develop our financial skills</h3>
      </div>
      <div class="flex flex-row gap-2 text-center">
        <h1 class="text-[#00333] text-sm">By</h1>
        <span class="text-[#003333] text-sm">Sidati NOUHI</span>
      </div>
    </div>
    <div class="bg-white shadow-lg rounded-lg w-[260px] h-fit p-6 flex flex-col gap-2">
      <div class="flex gap-2">
        <img v-bind:src="'./src/assets/eye.png'" class="w-5" alt="">
        <span class="text-[#003333] text-sm"> 5 min</span>
      </div>
      <img v-bind:src="'./src/assets/article.png'" alt="">
      <div class="flex flex-col gap-4">
        <h3 class="font-medium text-[15px] text-wrap text-[#003333]">Wisdom is an opportunity for us young people to
          develop our financial skills</h3>
      </div>
      <div class="flex flex-row gap-2 text-center">
        <h1 class="text-[#00333] text-sm">By</h1>
        <span class="text-[#003333] text-sm">Sidati NOUHI</span>
      </div>
    </div>
  </div>
</template>