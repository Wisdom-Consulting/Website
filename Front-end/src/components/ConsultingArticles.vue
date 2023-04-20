<script setup>
import {useConsultancyStore} from "@/stores/Consultancy";
import VPagination from "@hennge/vue3-pagination";
import "@hennge/vue3-pagination/dist/vue3-pagination.css";
import {onMounted, ref} from "vue";

const consultancyStore = useConsultancyStore()

let page = ref(1)

await consultancyStore.getArticles(page.value)

</script>

<template>
  <div class="flex flex-col border-lg border-black gap-2 mt-20">
    <div v-for="article in consultancyStore.content" class="flex flex-row flex-wrap gap-2 justify-center">
      <div class="bg-white shadow-lg rounded-lg w-[200px] h-[200px] p-2 hidden md:flex flex-col gap-2">
        <div class="flex gap-2 justify-center">
          <span class="text-[#003333] text-sm"></span>
        </div>
        <img :src="article.user.image ? article.user.image : './src/assets/consultant_male.png'"
             class="w-20 self-center rounded-full border-[#003333] border-[2px]" alt="">
        <div class="flex flex-col gap-4">
          <h3 class="font-medium text-[15px] text-wrap text-center text-[#003333]">{{ article.user.name }}</h3>
        </div>
<!--        <button class="bg-[#003333] text-white rounded-2xl w-fit px-4 py-2 h-fit self-center">Contact</button>-->
      </div>
      <div
          class="bg-white shadow-lg rounded-lg w-full sm:w-[560px] md:w-[560px] h-[300px] sm:h-[200px] p-6 m-5 flex flex-col justify-between gap-2">
        <div class="flex gap-2 justify-start md:hidden flex">
          <img :src="article.user.image ? article.user.image : './src/assets/consultant_male.png'"
               class="w-8 rounded-full border-[#003333] border-[2px]" alt="">
          <span class="text-[#003333] text-sm self-center">{{ article.user.name }}</span>
        </div>
        <div class="flex flex-col gap-4">
          <h3 class="font-bold text-[15px] text-wrap text-[#003333]">{{ article.title }}</h3>
        </div>
        <div class="flex flex-col gap-4">
          <h3 class="font-medium text-[15px] text-wrap text-[#003333]">{{ article.body.slice(0, 130) }}...
            <RouterLink to="" class="text-black">Read more</RouterLink>
          </h3>
        </div>
        <button @click="consultancyStore.showArticle(article.id)" class="bg-[#003333] text-white rounded-2xl w-fit px-4 py-2 h-fit self-end">Read</button>
      </div>
    </div>
  </div>
  <div class="flex justify-center items-center p-2">
    <VPagination
        v-model="page"
        :pages="consultancyStore.totalPages"
        :range-size="1"
        active-color="#DDDDDD"
        inactive-color="#GHGHGH"
        :show-prev-next="true"
        :show-first-last="true"
        :show-page-size="false"
        @update:modelValue="consultancyStore.getArticles(page)"
    />
  </div>
</template>