<script setup>
import {RouterView} from 'vue-router'
import {onMounted} from "vue";
import { useAuthStore} from "@/stores/Auth";
import "./axios"
import Navbar from "@/components/Navbar.vue";
import Footer from "@/components/Footer.vue";
import {useConsultancyStore} from "@/stores/Consultancy";

const authStore = useAuthStore();
const consultancyStore = useConsultancyStore()

onMounted ( async () => {
  await authStore.getUser();
  await consultancyStore.getArticles();
  console.log(consultancyStore.content)
})

</script>

<template>
  <Navbar/>
  <RouterView/>
  <Footer/>
</template>