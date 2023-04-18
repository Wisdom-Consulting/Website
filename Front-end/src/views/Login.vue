<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import {useAuthStore} from "@/stores/Auth";

const authStore = useAuthStore()

const form = ref({
  email: "",
  password: ""
})
</script>
<template>
  <div class=" flex flex-col justify-center pt-0 pb-2 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-[#003333]">Sign in</h2>
      <div class="mt-2 text-center text-sm text-gray-600">
        <p  class="font-medium text-[#003333] hover:text-indigo-500">Fill out your details to login </p>
      </div>
    </div>

    <div class="mt-8 sm:mx-auto mx-auto sm:w-full sm:max-w-md">
      <div class="bg-[#F2F2F2] py-8 px-4 shadow sm:rounded-lg sm:px-10">
        <form class="space-y-6" @submit.prevent="authStore.logIn(form)">
          <div>
            <label for="email" class="flex justify-center text-md font-bold text-[#003333]"> Email address </label>
            <div class="mt-1">
              <input id="email" v-model="form.email" type="email" autocomplete="email" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            </div>
              <span class="text-xs italic text-red-500">{{ authStore.authError ? authStore.authError : null }}</span>
          </div>

          <div>
            <label for="password" class="flex justify-center text-md font-bold text-[#003333]"> Password </label>
            <div class="mt-1">
              <input id="password" v-model="form.password" type="password" autocomplete="current-password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            </div>
          </div>

          <div class="flex flex-col sm:flex-row items-center justify-between">
            <div class="flex items-center">
              <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
              <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me </label>
            </div>

            <div class="text-sm">
              <a href="#" class="font-medium text-[#003333] hover:text-indigo-500"> Forgot your password? </a>
            </div>
          </div>

          <div class="flex justify-center">
            <button type="submit" class="w-fit flex justify-center py-2 px-6 border border-transparent rounded-3xl shadow-sm text-md font-bold text-white bg-[#003333] hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign in</button>
          </div>
          <div class="mt-2 text-center text-sm text-gray-600 flex flex-row justify-center gap-1">
            <p  class="font-medium text-[#003333]">Do not have account?</p>
            <RouterLink class="text-bold font-bold text-[#003333]" to="/signup">Sign Up</RouterLink>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
