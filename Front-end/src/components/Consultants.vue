<script setup></script>

<template>
  <h1 class="mt-10 font-bold ml-10 text-[30px] text-wrap text-[#003333] flex mx-auto justify-start">Our consultants</h1>
  <div class="flex flex-row flex-wrap gap-4 justify-center">
    <div class="bg-white shadow-lg rounded-lg w-[260px] h-fit p-6 flex flex-col gap-2">
      <div class="flex gap-2 justify-center">
        <span class="text-[#003333] text-sm">Sidati NOUHI</span>
      </div>
      <img v-bind:src="'./src/assets/consultant_male.png'" alt="">
      <div class="flex flex-col gap-4">
        <h3 class="font-medium text-[15px] text-wrap text-[#003333]">Wisdom is an opportunity for us young people to
          develop our financial skills</h3>
      </div>
    </div>
    <div class="bg-white shadow-lg rounded-lg w-[260px] h-fit p-6 flex flex-col gap-2">
      <div class="flex gap-2 justify-center">
        <span class="text-[#003333] text-sm">Sidati NOUHI</span>
      </div>
      <img v-bind:src="'./src/assets/consultant_female.png'" alt="">
      <div class="flex flex-col gap-4">
        <h3 class="font-medium text-[15px] text-wrap text-[#003333]">Wisdom is an opportunity for us young people to
          develop our financial skills</h3>
      </div>
    </div>
    <div class="bg-white shadow-lg rounded-lg w-[260px] h-fit p-6 flex flex-col gap-2">
      <div class="flex gap-2 justify-center">
        <span class="text-[#003333] text-sm">Sidati NOUHI</span>
      </div>
      <img v-bind:src="'./src/assets/consultant_female.png'" alt="">
      <div class="flex flex-col gap-4">
        <h3 class="font-medium text-[15px] text-wrap text-[#003333]">Wisdom is an opportunity for us young people to
          develop our financial skills</h3>
      </div>
    </div>
  </div>
</template>