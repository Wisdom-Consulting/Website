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
        selected: (state) => state.selectedChat
    },
    actions: {
        async getChats() {
            const response = await axios.get('/api/chats')
            this.inbox = response.data
            console.log(response.data)
        },
        async getMessages(chat) {
            const response = await axios.get(`/api/messages/?receiver_id=${chat.users[0].user_id}`)
            this.selectedChat = chat
            this.messages = response.data
            console.log(response.data)
        },
        async sendMessage(message, chat) {
            console.log(message, chat)
            const response = await axios.post('/api/messages', {
                message: message,
                receiver_id: chat.users[0].user_id
            })
            this.messages.push({
                message: message,
                created_at: new Date(),
            })
        }
    }
})