<script setup>
import {ref} from 'vue'
import {useAuthStore} from "@/stores/Auth";

const authStore = useAuthStore();

const form = ref({
  name: "",
  email: "",
  password: "",
  password_confirmation: ""
})
</script>
<template>
  <div class="min-h-full flex flex-col justify-center pt-0 pb-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-[#003333]">Create account</h2>
      <div class="mt-2 text-center text-sm text-gray-600">
        <p class="font-medium text-[#003333] hover:text-indigo-500">Fill out your details to sign up </p>
      </div>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="bg-[#F2F2F2] py-8 px-4 shadow sm:rounded-lg sm:px-10">
        <form class="space-y-4" @submit.prevent="authStore.signUp(form)">
          <div>
            <label for="fullName" class="flex justify-center text-md font-bold text-[#003333]"> Full name </label>
            <div class="mt-1">
              <input id="fullName" v-model="form.name" type="text" required=""
                     class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
            </div>
          </div>

          <div>
            <label for="email" class="flex justify-center text-md font-bold text-[#003333]"> Email address </label>
            <div class="mt-1">
              <input id="email" v-model="form.email" type="email" autocomplete="email" required=""
                     class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
            </div>
            <span v-if="authStore.errors.email" class="text-sm text-red-500">{{ authStore.errors.email[0] }}</span>
          </div>

          <div>
            <label for="password" class="flex justify-center text-md font-bold text-[#003333]"> Password </label>
            <div class="mt-1">
              <input id="password" v-model="form.password" type="password" autocomplete="current-password" required=""
                     class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
              <span v-if="form.password.length < 8 && form.password.length > 0"
                    class="text-sm text-red-500">Password must be at least 8 characters</span>
            </div>
          </div>

          <div>
            <label for="confirm_password" class="flex justify-center text-md font-bold text-[#003333]">Confirm
              password </label>
            <div class="mt-1">
              <input id="password_confirmation" v-model="form.password_confirmation" type="password"
                     autocomplete="current-password" required=""
                     class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
              <span v-if="form.password_confirmation !== form.password" class="text-sm text-red-500">Password does not match</span>
            </div>
          </div>

          <div class="flex justify-center">
            <button type="submit"
                    class="w-fit flex justify-center py-2 px-6 border border-transparent rounded-3xl shadow-sm text-md font-bold text-white bg-[#003333] hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Sign up
            </button>
          </div>
          <div class="mt-2 text-center text-sm text-gray-600 flex flex-row justify-center gap-1">
            <p class="font-medium text-[#003333]">Have an account?</p>
            <RouterLink class="text-bold font-bold text-[#003333]" to="/login">Log In</RouterLink>
          </div>
        </form>
        <form @submit.prevent="authStore.logOut()">
          <button type="submit">Logout</button>
        </form>
      </div>
    </div>
  </div>
</template>
