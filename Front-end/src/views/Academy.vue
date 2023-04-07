<script setup>
import Search from "@/views/Component/Search.vue";
</script>

<template>
  <main>
    <Search/>
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
    <h1 class="mt-10 font-bold ml-10 text-[30px] text-wrap text-[#003333] flex mx-auto justify-start">All articles</h1>
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
    <h1 class="font-bold text-[30px] text-wrap text-[#003333] flex mx-auto justify-center mt-10">Ask us a question</h1>
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="mt-10">
        <input type="text" name="name" id="name"
               class="shadow-sm focus:ring-indigo-500 block w-full h-75 sm:text-sm border-[#003333] border-[6px] px-4 rounded-full"
               placeholder="We answer all your questions"/>
      </div>
    </div>
    <div id="containerr mt-20" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
      <div class="flex-col gap-8 w-full md:flex md:flex-row md:align-center">
        <div class="w-fit md:w-1/3 flex flex-col">
          <h1 class="font-bold text-[45px] w-fit text-wrap text-[#003333]">Ready to master your finances?</h1>
          <h2 class="font-medium text-[20px] text-wrap text-[#003333]">Your future belongs to you.</h2>
        </div>
        <div class="w-fit md:w-1/3 text-center flex flex-col">
          <RouterLink to=""
                      class="btn px-4 py-2 bg-[#003333] w-fit self-center border-[6px] border-[#003333] rounded-2xl text-white font-bold mt-10">
            Become a Wise
          </RouterLink>
        </div>
        <div class="w-fit md:w-1/3 text-center flex flex-col justify-center">
          <svg class="w-10 self-center" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" id="instagram"><path d="M17.34,5.46h0a1.2,1.2,0,1,0,1.2,1.2A1.2,1.2,0,0,0,17.34,5.46Zm4.6,2.42a7.59,7.59,0,0,0-.46-2.43,4.94,4.94,0,0,0-1.16-1.77,4.7,4.7,0,0,0-1.77-1.15,7.3,7.3,0,0,0-2.43-.47C15.06,2,14.72,2,12,2s-3.06,0-4.12.06a7.3,7.3,0,0,0-2.43.47A4.78,4.78,0,0,0,3.68,3.68,4.7,4.7,0,0,0,2.53,5.45a7.3,7.3,0,0,0-.47,2.43C2,8.94,2,9.28,2,12s0,3.06.06,4.12a7.3,7.3,0,0,0,.47,2.43,4.7,4.7,0,0,0,1.15,1.77,4.78,4.78,0,0,0,1.77,1.15,7.3,7.3,0,0,0,2.43.47C8.94,22,9.28,22,12,22s3.06,0,4.12-.06a7.3,7.3,0,0,0,2.43-.47,4.7,4.7,0,0,0,1.77-1.15,4.85,4.85,0,0,0,1.16-1.77,7.59,7.59,0,0,0,.46-2.43c0-1.06.06-1.4.06-4.12S22,8.94,21.94,7.88ZM20.14,16a5.61,5.61,0,0,1-.34,1.86,3.06,3.06,0,0,1-.75,1.15,3.19,3.19,0,0,1-1.15.75,5.61,5.61,0,0,1-1.86.34c-1,.05-1.37.06-4,.06s-3,0-4-.06A5.73,5.73,0,0,1,6.1,19.8,3.27,3.27,0,0,1,5,19.05a3,3,0,0,1-.74-1.15A5.54,5.54,0,0,1,3.86,16c0-1-.06-1.37-.06-4s0-3,.06-4A5.54,5.54,0,0,1,4.21,6.1,3,3,0,0,1,5,5,3.14,3.14,0,0,1,6.1,4.2,5.73,5.73,0,0,1,8,3.86c1,0,1.37-.06,4-.06s3,0,4,.06a5.61,5.61,0,0,1,1.86.34A3.06,3.06,0,0,1,19.05,5,3.06,3.06,0,0,1,19.8,6.1,5.61,5.61,0,0,1,20.14,8c.05,1,.06,1.37.06,4S20.19,15,20.14,16ZM12,6.87A5.13,5.13,0,1,0,17.14,12,5.12,5.12,0,0,0,12,6.87Zm0,8.46A3.33,3.33,0,1,1,15.33,12,3.33,3.33,0,0,1,12,15.33Z"></path></svg>
          <svg class="w-10 self-center" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" id="facebook"><path d="M20.9,2H3.1A1.1,1.1,0,0,0,2,3.1V20.9A1.1,1.1,0,0,0,3.1,22h9.58V14.25h-2.6v-3h2.6V9a3.64,3.64,0,0,1,3.88-4,20.26,20.26,0,0,1,2.33.12v2.7H17.3c-1.26,0-1.5.6-1.5,1.47v1.93h3l-.39,3H15.8V22h5.1A1.1,1.1,0,0,0,22,20.9V3.1A1.1,1.1,0,0,0,20.9,2Z"></path></svg>
        </div>
      </div>
    </div>
  </main>
</template>