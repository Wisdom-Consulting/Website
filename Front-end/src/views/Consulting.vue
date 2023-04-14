<script setup>
import {useConsultancyStore} from "@/stores/Consultancy";
import Search from "@/components/Search.vue";
import "@hennge/vue3-pagination/dist/vue3-pagination.css";
import {ref} from "vue";
import ConsultingArticles from "@/components/ConsultingArticles.vue";

const consultancyStore = useConsultancyStore()

let page = ref(1)

</script>

<template>
  <search/>
  <Suspense>
    <template #default>
      <ConsultingArticles/>
    </template>
    <template #fallback>

      <div role="status" class="mx-auto max-w-2xl flex flex-col gap-4 mt-10">
        <h3 class="h-4 bg-gray-200 rounded-md dark:bg-gray-700" style="width: 40%;"></h3>
        <ul class="mt-5 space-y-3">
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
        </ul>
        <h3 class="h-4 bg-gray-200 rounded-md dark:bg-gray-700" style="width: 40%;"></h3>
        <ul class="mt-5 space-y-3">
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
        </ul>
        <h3 class="h-4 bg-gray-200 rounded-md dark:bg-gray-700" style="width: 40%;"></h3>
        <ul class="mt-5 space-y-3">
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
        </ul>
        <h3 class="h-4 bg-gray-200 rounded-md dark:bg-gray-700" style="width: 40%;"></h3>
        <ul class="mt-5 space-y-3">
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
        </ul>
        <h3 class="h-4 bg-gray-200 rounded-md dark:bg-gray-700" style="width: 40%;"></h3>
        <ul class="mt-5 space-y-3">
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
          <li class="w-full h-4 bg-gray-200 rounded-md dark:bg-gray-700"></li>
        </ul>
      </div>

    </template>
  </Suspense>
</template>