<script setup>
</script>

<template>
  <main>
    <div class="flex flex-col md:flex-row md:gap-4 mx-auto mt-10 max-w-7xl px-4 sm:px-6 lg:px-8">
      <div id="filters" class="flex text-[#003333] text-sm md:text-lg justify-between gap-4 mx-auto">
        <RouterLink to="">Learn to save</RouterLink>
        <RouterLink to="">Financing solutions</RouterLink>
        <RouterLink to="">Financial dictionary</RouterLink>
        <RouterLink to="">Learn to invest</RouterLink>
        <RouterLink to="">Financial services</RouterLink>
      </div>
      <div class="relative">
<!--        <i class="absolute fa fa-search text-gray-400 top-5 left-4"></i>-->
        <font-awesome-icon class="absolute text-[#003333] top-2 left-2" icon="fa-solid fa-search" />
        <input type="text" class="bg-[#DDDDDD] h-8 w-full pl-8 rounded-2xl border-none focus:outline-none hover:cursor-pointer" name="">
      </div>
    </div>
  </main>
</template>