<script setup>
import {defineProps, ref} from 'vue'
import {useInboxStore} from "@/stores/Inbox";
import ChatBox from "@/components/ChatBox.vue";
const selectedChat = ref (null)
const inboxStore = useInboxStore()

</script>

<template>
  <div class="flex w-full justify-center gap-2">
    <div class="mx-4 flex w-full flex-col sm:w-fit">

      <!-- Search -->
      <div class="px-2 py-2 bg-grey-lightest">
        <input type="text" class="w-full px-2 py-2 text-sm rounded-3xl bg-[#DDDDDD] border-none" placeholder="Search or start new chat"/>
      </div>

      <!-- Contacts -->
      <div v-for="chat in inboxStore.chats" @click="selectedChat = chat" class="overflow-auto bg-grey-lighter">
        <div class="flex cursor-pointer items-center px-3 bg-grey-light">
          <div>
            <img class="h-12 w-12 rounded-full"
                 :src="chat.users[0].image" alt=""/>
          </div>
          <div class="ml-4 flex-1 border-b py-4 border-grey-lighter">
            <div class="flex justify-between items-bottom">
              <p class="text-grey-darkest">
                {{chat.users[0].name}}
              </p>
              <p class="text-xs text-grey-darkest">
                {{chat.messages[0].created_at.slice(11, 16)}}
              </p>
            </div>
            <p class="mt-1 text-sm text-grey-dark">
              {{chat.last_message.message.slice(0, 30)}}...
            </p>
          </div>
        </div>
      </div>
    </div>
    <ChatBox :chat="selectedChat"/>
  </div>
</template>