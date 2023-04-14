import {defineStore} from 'pinia'
import axios from 'axios'

export const usePostStore = defineStore('Post', {
    state: () => ({
        posts: [],
        post: []
    }),
    getters: {
        allPosts: (state) => state.posts,
        onePost: (state) => state.post
    },
    actions: {
        async getPosts() {
            const response = await axios.get('/api/posts')
            this.posts = response.data
        },
        async createPost(post) {
            const response = await axios.post('/api/posts', post)
            this.posts.push(response.data)
        },
        async deletePost(id) {
            await axios.delete(`/api/posts/${id}`)
            this.posts = this.posts.filter(post => post.id !== id)
        },
        async updatePost(post) {
            const response = await axios.put(`/api/posts/${post.id}`, post)
            this.posts = this.Post.map(p => p.id === post.id ? response.data : p)
        },
        async getPost(id) {
            const response = await axios.get(`/api/posts/${id}`)
            this.post = response.data
        }
    }
})