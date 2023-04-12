<script setup></script>

<template>
  <main class="parent">
    <div class="rectangle">
      <img v-bind:src="'./src/assets/landing_rectangle.png'" class="h-fit" alt="">
    </div>
    <div class="opening1">
      <div class="w-full flex flex-col gap-4">
        <h1 class="font-extrabold lg:text-[55px] text-[30px] text-wrap text-[#003333]">Boost your financial competencies !</h1>
        <h2 class="font-medium text-[30px] text-wrap text-[#003333]">The wise platform that helps you better manage your
          finances !</h2>
        <div class="flex gap-4 w-full">
          <RouterLink to=""
                      class="btn px-4 py-2 bg-[#003333] border-[6px] border-[#003333] rounded-2xl text-white font-bold">
            Test my knowledge
          </RouterLink>
          <RouterLink to="" class="btn px-4 py-2 border-[6px] border-[#003333] rounded-2xl text-[#003333] font-bold">Create account
          </RouterLink>
        </div>
      </div>
    </div>
    <div class="landing_image_1 hidden lg:block">
      <img v-bind:src="'./src/assets/landing_image_1.png'" class="lg:self-center" alt="">
    </div>
    <div class="landing_image_2">
      <img v-bind:src="'./src/assets/landing_image_2.png'" alt="">
    </div>
    <div class="opening2">
      <div class="w-full flex flex-col gap-4">
        <h1 class="font-extrabold text-[45px] text-wrap text-[#003333]">The Community</h1>
        <h1 class="font-bold text-[45px] bg-[#DDDDDD] w-fit pr-2 text-wrap text-[#003333]">Platform</h1>
        <h2 class="font-medium text-[45px] text-wrap text-[#003333]">Dedicated to the financial training of young
          people!</h2>
        <h2 class="font-medium text-[20px] text-wrap text-[#003333]">Wisdom allows you to test and develop your
          financial knowledge, and find the answers to all your questions!</h2>
      </div>
    </div>
  </main>
</template>