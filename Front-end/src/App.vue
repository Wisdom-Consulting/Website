<script setup>
import {RouterView} from 'vue-router'
import {onMounted} from "vue";
import { useAuthStore} from "@/stores/Auth";
import "./axios"
import Navbar from "@/components/Navbar.vue";
import Footer from "@/components/Footer.vue";
import {useConsultancyStore} from "@/stores/Consultancy";
import {useDashboardStore} from "@/stores/Dashboard";

const authStore = useAuthStore();
const consultancyStore = useConsultancyStore()
const dashboardStore = useDashboardStore()

onMounted ( async () => {
  if (authStore.user === null) {
    await authStore.getUser();
  }
  if (consultancyStore.content === null){
    await consultancyStore.getArticles();
  }
    // await dashboardStore.assignRoleToUser('admin', '65');
})

</script>

<template>
  <Navbar/>
  <RouterView/>
  <Footer/>
</template>