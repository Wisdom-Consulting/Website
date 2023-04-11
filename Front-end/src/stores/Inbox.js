import {defineStore} from 'pinia'
import axios from 'axios'

export const useInboxStore = defineStore('Inbox', {
    state: () => ({
        inbox: [],
        messages: [],
        selectedChat: null,
    }),
    getters: {
        chats: (state) => state.inbox,
        chat: (state) => state.messages,
        selected: (state) => state.selectedChat,
    },
    actions: {
        async getChats() {
            const response = await axios.get('/api/chats')
            this.inbox = response.data
            console.log(response.data)
        },
        selectChat(chat) {
            this.selectedChat = chat
        },
        async sendMessage(message, chat) {
            const response = await axios.post('/api/messages', {
                message: message,
                receiver_id: chat.users[0].user_id
            })
            this.inbox.find((c) => c.id === chat.id).messages.push({
                message: message,
                created_at: new Date(),
                user: authStore.user
            })
        }
    }
})