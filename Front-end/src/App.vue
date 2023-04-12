<script setup>
import {RouterView} from 'vue-router'
import {onMounted} from "vue";
import { useAuthStore} from "@/stores/Auth";
import "./axios"
import Navbar from "@/components/Navbar.vue";
import Footer from "@/components/Footer.vue";
import {useConsultancyStore} from "@/stores/Consultancy";
import {usePostStore} from "@/stores/Post";
import {useInboxStore} from "@/stores/Inbox";

const authStore = useAuthStore();
const consultancyStore = useConsultancyStore()
const PostStore = usePostStore()
const InboxStore = useInboxStore()

onMounted ( async () => {
  if (authStore.user === null) {
    await authStore.getUser();
  }
  if (consultancyStore.content === null){
    await consultancyStore.getArticles();
  }
    // await dashboardStore.assignRoleToUser('admin', '65');


  await InboxStore.getChats();
  console.log(InboxStore.chats)
})

</script>

<template>
  <Navbar/>
  <RouterView/>
  <Footer/>
</template>