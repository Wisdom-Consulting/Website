import {defineStore} from 'pinia'
import axios from 'axios'

export const useInboxStore = defineStore('Inbox', {
    state: () => ({
        inbox: [],
        messages: [],
        selectedChat: null
    }),
    getters: {
        chats:(state)=> state.inbox,
        chat: (state) => state.messages,
        selected: (state) => state.selectedChat
    },
    actions: {
        async getChats() {
            const response = await axios.get('/api/chats')
            this.inbox = response.data
            console.log(response.data)
        },
        selectChat(chat) {
            this.selectedChat = chat
        }
    }
})