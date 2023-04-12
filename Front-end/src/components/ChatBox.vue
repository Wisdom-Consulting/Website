<script setup>
import {useInboxStore} from "@/stores/Inbox";
import {useAuthStore} from "@/stores/Auth";
import {ref} from "vue";

const inboxStore = useInboxStore()
const authStore = useAuthStore()
const form = ref({
  message: "",
})
const props = defineProps({
  chat: {
    required: true,
  },
  receiver: {
    required: true,
  }
})
const sendMessage = async () => {
  if (form.value.message === "") return
  await inboxStore.sendMessage(form.value.message, props.receiver)
  form.value.message = ""
}
</script>

<template>
  <div class="hidden flex-col justify-between p:2 max-h-[550px] min-h-[507px] sm:flex sm:flex-1 sm:p-6"
       v-if="!inboxStore.selected">
    <!-- A message indicating that no chat was selected   -->
    <div class="flex flex-col items-center justify-center h-full">
      <div class="flex flex-col items-center justify-center">
        <div class="flex items-center justify-center h-12 w-12 rounded-full bg-blue-100">
          <span class="svg-icon svg-icon-primary svg-icon-2x">
            <svg
              xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
              viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><polygon fill="#003333" opacity="0.9" points="5 15 3 21.5 9.5 19.5"/><path
            d="M13.5,21 C8.25329488,21 4,16.7467051 4,11.5 C4,6.25329488 8.25329488,2 13.5,2 C18.7467051,2 23,6.25329488 23,11.5 C23,16.7467051 18.7467051,21 13.5,21 Z M8.5,13 C9.32842712,13 10,12.3284271 10,11.5 C10,10.6715729 9.32842712,10 8.5,10 C7.67157288,10 7,10.6715729 7,11.5 C7,12.3284271 7.67157288,13 8.5,13 Z M13.5,13 C14.3284271,13 15,12.3284271 15,11.5 C15,10.6715729 14.3284271,10 13.5,10 C12.6715729,10 12,10.6715729 12,11.5 C12,12.3284271 12.6715729,13 13.5,13 Z M18.5,13 C19.3284271,13 20,12.3284271 20,11.5 C20,10.6715729 19.3284271,10 18.5,10 C17.6715729,10 17,10.6715729 17,11.5 C17,12.3284271 17.6715729,13 18.5,13 Z"
            fill="#003333"/></g></svg>
          </span>
        </div>
        <p class="mt-2 text-sm text-gray-600">
          Select a chat to start messaging
        </p>
      </div>
    </div>
  </div>
  <!-- Chat area -->
  <div v-else class="hidden flex-col justify-between p:2 max-h-[550px] min-h-[507px] sm:flex sm:flex-1 sm:p-6">
    <div class="flex justify-between border-b-2 border-gray-200 py-3 sm:items-center">
      <div class="relative flex items-center space-x-4">
        <div class="relative">
          <img :src="inboxStore.selected.users[0].image ? inboxStore.selected.users[0].image : 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80'"
               alt="" class="h-10 w-10 rounded-full sm:h-10 sm:w-10">
        </div>
        <div class="flex flex-col leading-tight">
          <div class="mt-1 flex items-center text-2xl">
            <span class="mr-3 text-gray-700">{{ inboxStore.selected.users[0].name }}</span>
          </div>
        </div>
      </div>
    </div>
    <div id="messages"
         class="flex flex-col overflow-y-auto p-3 space-y-4 scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
      <!--        v-if="authStore.user.name !== message.user.name"-->
      <div v-for="message in inboxStore.chat"
           class="chat-message">
        <div v-if="authStore.user.name !== message.user.name" class="flex items-end">
          <div class="order-2 mx-2 flex max-w-xs flex-col items-start text-xs space-y-2">
            <div><span
                class="inline-block rounded-lg rounded-bl-none bg-gray-300 px-4 py-2 text-gray-600">
              {{ message.message }}</span>
            </div>
          </div>
          <img :src="message.user.image ? message.user.image : 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80'" alt="My profile" class="order-1 h-6 w-6 rounded-full">
        </div>
        <div v-else class="flex items-end justify-end">
          <div class="order-1 mx-2 flex max-w-xs flex-col items-end text-xs space-y-2">
            <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-[#003333] text-white ">
              {{ message.message }}</span>
            </div>
          </div>
          <img
              :src="message.user.image ? message.user.image : 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80'"
              alt="My profile" class="order-2 h-6 w-6 rounded-full">
        </div>
      </div>
    </div>
    <div class="mb-2 border-t-2 border-gray-200 px-4 pt-4 sm:mb-0">
      <form class="relative flex">
        <input v-model="form.message" type="text" placeholder="Write your message!"
               class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 bg-[#DDDDDD] rounded-3xl py-3 border-none">
        <div class="absolute inset-y-0 right-0 hidden items-center sm:flex">
          <button type="submit" @click.prevent="sendMessage"
                  class="inline-flex items-center justify-center rounded-3xl px-2 mr-2 py-2 transition duration-500 ease-in-out text-white bg-[#003333] hover:bg-blue-400 focus:outline-none">
            <span class="font-bold">Send</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                 class="ml-2 h-6 w-6 rotate-90 transform">
              <path
                  d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
            </svg>
          </button>
        </div>
      </form>
    </div>
  </div>
</template>