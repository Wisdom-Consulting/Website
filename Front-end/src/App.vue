<script setup>
import {RouterView} from 'vue-router'
import {onMounted} from "vue";
import { useAuthStore} from "@/stores/Auth";
import "./axios"
import Navbar from "@/components/Navbar.vue";
import Footer from "@/components/Footer.vue";

const authStore = useAuthStore();

onMounted ( async () => {
  await authStore.getUser();
})

</script>

<template>
  <Navbar/>
  <RouterView/>
  <Footer/>
</template>