import {defineStore} from 'pinia'
import axios from 'axios'

export const usePostStore = defineStore('Post', {
    state: () => ({
        Post: []
    }),
    getters: {
        posts: (state) => state.Post
    },
    actions: {
        async getPosts() {
            const response = await axios.get('/api/posts')
            this.Post = response.data
        }
    }
})