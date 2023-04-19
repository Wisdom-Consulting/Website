<script setup>
import {RouterView} from 'vue-router'
import {onMounted} from "vue";
import "./axios"
import Navbar from "@/components/Navbar.vue";
import Footer from "@/components/Footer.vue";
import {useInboxStore} from "@/stores/Inbox";

const InboxStore = useInboxStore()

onMounted ( async () => {
  await InboxStore.getChats();
  console.log(InboxStore.chats)
})

</script>

<template>
  <Suspense>
    <template #default>
      <Navbar/>
    </template>
    <template #fallback>
      <section class="bg-white dark:bg-gray-900">
        <div class="container flex flex-col items-center justify-between p-6 mx-auto space-y-4 animate-pulse sm:space-y-0 sm:flex-row">
          <p class="w-32 h-2 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
          <div class="flex flex-wrap items-center justify-center gap-6 mt-10">
            <p class="w-20 h-2 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
            <p class="w-20 h-2 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
            <p class="w-20 h-2 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
            <p class="w-20 h-2 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
            <p class="w-20 h-2 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
            <p class="w-8 h-8 bg-gray-200 rounded-full dark:bg-gray-700"></p>
          </div>
        </div>
      </section>
    </template>
  </Suspense>
      <RouterView/>
      <Footer/>
</template>
