<script setup>
import {RouterLink} from 'vue-router'
</script>

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
          <RouterLink to="" class="btn px-4 py-2 border-[6px] rounded-2xl text-[#003333] font-bold">Create account
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
  <div id="container mt-20" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex-col gap-8 w-full md:flex md:flex-row md:align-center">
      <div class="w-fit md:w-1/3 text-center flex flex-col gap-4">
        <h1 class="font-bold text-[30px] text-wrap text-[#003333]">An adapted curriculum</h1>
        <h3 class="font-medium text-[20px] text-wrap text-[#003333]">To assess your financial knowledge, and progress at
          your own pace</h3>
      </div>
      <div class="w-fit md:w-1/3 text-center flex flex-col gap-4">
        <h1 class="font-bold text-[30px] text-wrap text-[#003333]">A knowledge library</h1>
        <h3 class="font-medium text-[20px] text-wrap text-[#003333]">To assess your financial knowledge, and progress at
          your own pace</h3>
      </div>
      <div class="w-fit md:w-1/3 text-center flex flex-col gap-4">
        <h1 class="font-bold text-[30px] text-wrap text-[#003333]">Wisdom Academy</h1>
        <h3 class="font-medium text-[20px] text-wrap text-[#003333]">To assess your financial knowledge, and progress at
          your own pace</h3>
      </div>
    </div>
  </div>
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
  <h1 class="font-bold text-[30px] text-wrap text-[#003333] flex mx-auto justify-center">Why joining WISDOM ?</h1>
  <div class="parent3 mt-20">
    <div class="opening3 flex flex-col my-auto">
      <div class="w-full flex flex-col">
        <h1 class="font-extrabold text-[45px] text-wrap text-[#003333]">One vision</h1>
        <h1 class="font-bold text-[45px] w-fit text-wrap text-[#003333]">Community first</h1>
        <h2 class="font-medium text-[20px] text-wrap text-[#003333]">Wisdom is above all hundreds of future Wise in
          search of developing their financial skills.</h2>
      </div>
    </div>
    <div class="landing_image_3 flex mx-auto">
      <img v-bind:src="'src/assets/landing_image_3.png'" class="self-center" alt="">
    </div>
    <div class="landing_image_4 flex mx-auto">
      <img v-bind:src="'src/assets/landing_image_4.png'" class="self-center" alt="">
    </div>
    <div class="opening4 flex flex-col my-auto">
      <div class="w-full flex flex-col">
        <h1 class="font-extrabold text-[45px] text-wrap text-[#003333]">Access a large</h1>
        <h1 class="font-bold text-[45px] w-fit text-wrap text-[#003333]">Community</h1>
        <h2 class="font-medium text-[20px] text-wrap text-[#003333]">Wisdom is above all hundreds of future Wise in
          search of developing their financial skills.</h2>
      </div>
    </div>
  </div>
  <div id="container mt-20" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
    <div class="flex-col gap-8 w-full md:flex md:flex-row md:align-center">
      <div class="w-fit md:w-1/3 text-center flex flex-col">
        <h1 class="font-bold text-[50px] text-wrap text-[#003333]">+2000</h1>
        <h3 class="font-medium text-[20px] text-wrap text-[#003333]">Registration</h3>
      </div>
      <div class="w-fit md:w-1/3 text-center flex flex-col">
        <h1 class="font-bold text-[50px] text-wrap text-[#003333]">+1700</h1>
        <h3 class="font-medium text-[20px] text-wrap text-[#003333]">Wise</h3>
      </div>
      <div class="w-fit md:w-1/3 text-center flex flex-col">
        <h1 class="font-bold text-[50px] text-wrap text-[#003333]">+2000</h1>
        <h3 class="font-medium text-[20px] text-wrap text-[#003333]">Subscribers</h3>
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
  <div id="container mt-20" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
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
  <div class="flex bg-[#003333] w-full p-4 mt-10 justify-between align-center gap-2 text-xs md:text-lg">
    <img v-bind:src="'./src/assets/footer_logo.png'" class="md:h-full h-7 self-center" alt="">
    <RouterLink to="" class="text-white font-bold self-center">History</RouterLink>
    <RouterLink to="" class="text-white font-bold self-center">Academy</RouterLink>
    <RouterLink to="" class="text-white font-bold self-center">Contact</RouterLink>
    <RouterLink to="" class="text-white font-bold self-center">Privacy policy</RouterLink>
  </div>
</template>
