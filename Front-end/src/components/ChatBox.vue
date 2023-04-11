<script setup>
import {useInboxStore} from "@/stores/Inbox";
import {useAuthStore} from "@/stores/Auth";

const inboxStore = useInboxStore()
const authStore = useAuthStore()
</script>

<template>
  <div v-if="inboxStore.selected === null">
    <!-- A message indicating that no chat was selected   -->
    <div class="flex flex-col items-center justify-center h-full">
      <div class="flex flex-col items-center justify-center">
        <div class="flex items-center justify-center h-12 w-12 rounded-full bg-blue-100">
          <svg class="h-6 w-6 text-blue-600" fill="none" stroke-linecap="round" stroke-linejoin="round"
               stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path
                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
          </svg>
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
            <img :src="inboxStore.selected.users[0].image"
                alt="" class="h-10 w-10 rounded-full sm:h-10 sm:w-10">
          </div>
          <div class="flex flex-col leading-tight">
            <div class="mt-1 flex items-center text-2xl">
              <span class="mr-3 text-gray-700">{{inboxStore.selected.users[0].name}}</span>
            </div>
          </div>
        </div>
      </div>
      <div id="messages"
           class="flex flex-col overflow-y-auto p-3 space-y-4 scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
<!--        v-if="authStore.user.name !== message.user.name"-->
        <div v-for="message in inboxStore.selected.messages" class="chat-message">
          <div class="flex items-end">
            <div class="order-2 mx-2 flex max-w-xs flex-col items-start text-xs space-y-2">
              <div><span class="inline-block rounded-lg rounded-bl-none bg-gray-300 px-4 py-2 text-gray-600">{{message.message}}</span>
              </div>
            </div>
            <img :src="message.user.image" alt="My profile" class="order-1 h-6 w-6 rounded-full">
          </div>
        </div>
        <div class="chat-message">
          <div class="flex items-end justify-end">
            <div class="order-1 mx-2 flex max-w-xs flex-col items-end text-xs space-y-2">
              <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-[#003333] text-white ">Your error message says permission denied, npm global installs must be given root privileges.</span>
              </div>
            </div>
            <img
                src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                alt="My profile" class="order-2 h-6 w-6 rounded-full">
          </div>
        </div>
      </div>
      <div class="mb-2 border-t-2 border-gray-200 px-4 pt-4 sm:mb-0">
        <div class="relative flex">
          <input type="text" placeholder="Write your message!"
                 class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 bg-[#DDDDDD] rounded-3xl py-3 border-none">
          <div class="absolute inset-y-0 right-0 hidden items-center sm:flex">
            <button type="button"
                    class="inline-flex items-center justify-center rounded-3xl px-2 mr-2 py-2 transition duration-500 ease-in-out text-white bg-[#003333] hover:bg-blue-400 focus:outline-none">
              <span class="font-bold">Send</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                   class="ml-2 h-6 w-6 rotate-90 transform">
                <path
                    d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
</template>