<script setup></script>

<template>
  <div class="flex flex-col md:flex-row gap-8 md:gap-1 mx-auto mt-5 max-w-7xl px-4 sm:px-6 lg:px-8 justify-center">
    <div id="filters" class="flex text-[#003333] text-sm text-center md:text-lg justify-between gap-4">
      <RouterLink class="sm:w-[60px] md:w-[100px]" to="">Learn to save</RouterLink>
      <RouterLink class="sm:w-[60px] md:w-[100px]" to="">Financing solutions</RouterLink>
      <RouterLink class="sm:w-[60px] md:w-[100px]" to="">Financial dictionary</RouterLink>
      <RouterLink class="sm:w-[60px] md:w-[100px]" to="">Learn to invest</RouterLink>
      <RouterLink class="sm:w-[60px] md:w-[100px]" to="">Financial services</RouterLink>
    </div>
    <div class="relative content-center align-center max-w-md self-center">
      <font-awesome-icon class="absolute text-[#003333] top-2 left-2 self-center max-w-md" icon="fa-solid fa-search"/>
      <input type="text"
             class="bg-[#DDDDDD] h-8 w-full pl-8 rounded-2xl border-none focus:outline-none hover:cursor-pointer"
             name="">
    </div>
  </div>
</template>