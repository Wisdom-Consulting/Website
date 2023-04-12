<script setup>
import {defineProps, ref} from 'vue'
import {useInboxStore} from "@/stores/Inbox";
import ChatBox from "@/components/ChatBox.vue";
const selectedChat = ref (null)
const inboxStore = useInboxStore()

</script>

<template>
  <div class="flex w-full justify-center gap-2">
    <div class="mx-4 flex w-full flex-col sm:w-[300px]">

      <!-- Search -->
      <div class="px-2 py-2 bg-grey-lightest">
        <input type="text" class="w-full px-2 py-2 text-sm rounded-3xl bg-[#DDDDDD] border-none" placeholder="Search"/>
      </div>

      <!-- Contacts -->
      <div v-for="chat in inboxStore.chats" @click="inboxStore.getMessages(chat)" class="overflow-auto bg-grey-lighter">
        <div class="flex cursor-pointer items-center px-3 bg-grey-light">
          <div>
            <img class="h-12 w-12 rounded-full"
                 :src="chat.users[0].image ? chat.users[0].image : 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80'" alt=""/>
          </div>
          <div class="ml-4 flex-1 border-b py-4 border-grey-lighter">
            <div class="flex justify-between items-bottom">
              <p class="text-grey-darkest font-bold text-md text-[#003333]">
                {{chat.users[0].name}}
              </p>
              <p class="text-xs text-grey-darkest">{{chat.last_message.created_at.slice(11, 16)}}</p>
            </div>
            <p class="mt-1 text-sm text-grey-dark">
              {{chat.last_message.message.length > 31 ? chat.last_message.message.slice(0, 23) + "..." : chat.last_message.message}}
            </p>
          </div>
        </div>
      </div>
    </div>
    <ChatBox :chat="inboxStore.chat" :receiver="inboxStore.selected"/>
  </div>
</template>