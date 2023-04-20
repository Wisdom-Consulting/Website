import {defineStore} from 'pinia'
import axios from 'axios'
import {useToast} from "vue-toastification";

const toast = useToast()

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
        async createPost(body) {
            // console.log(body)
            // return
            try {
                const response = await axios.post('/api/posts', body)
                this.posts.push(response.data)
                await this.router.push('/mySpace')
                await this.router.push('/community')
                toast.success('Post created successfully')
            } catch (e) {
                toast.error('Something went wrong')
            }
        },
        async deletePost(id) {
            try {
                await axios.delete(`/api/posts/${id}`)
                this.posts = this.posts.filter(post => post.id !== id)
                toast.success('Post deleted successfully')
            } catch (e) {
                toast.error('Something went wrong')
            }
        },
        async updatePost(data) {
            try {
                const response = await axios.put(`/api/posts/${data.id}`, data)
                this.posts = this.posts.map(post => post.id === data.id ? response.data : post)
                await this.router.push('/mySpace')
                toast.success('Post updated successfully')
            } catch (e) {
                toast.error('Something went wrong')
            }
        },
        async getPost(id) {
            const response = await axios.get(`/api/posts/${id}`)
            this.post = response.data
        },
        async likePost(id) {
            try {
                const response = await axios.post(`/api/likes`, {
                    post_id: id
                })
                // if response.data is empty, it means the user already liked the post
                if (response.data.length === 0) {
                    return
                }
                if (this.post !== []) {
                    this.post.likes.push(response.data)
                }
                this.posts = this.posts.map(post => post.id === id ? this.post : post)
                toast.success('Post liked successfully')
            } catch (e) {
                toast.error('Something went wrong')
            }
        },
        async dislikePost(id) {
            try {
                const response = await axios.delete(`/api/posts/${id}/likes`)
                // remove like from post
                if (this.post !== []) {
                    // remove the last like from post
                    this.post.likes.pop()
                }
                // remove like from posts
                this.posts = this.posts.map(post => post.id === id ? this.post : post)
                toast.success('Post disliked successfully')
            } catch (e) {
                toast.error('Something went wrong')
            }
        },
        async addComment(data) {
            try {
                const response = await axios.post(`/api/comments`, data)
                this.post.comments.push(response.data)

                toast.success('Comment added successfully')
            } catch (e) {
                toast.error('Something went wrong')
            }
        },
        async loadPost(id) {
            const response = await axios.get(`/api/posts/${id}`)
            this.post = response.data
            await this.router.push(`/posts/editPost/${id}`)
        },
        async showPost(id) {
            try {
                const response = await axios.get(`/api/posts/${id}`);
                this.post = response.data
                await this.router.push(`/community/post/${id}`)
            } catch (e) {
                toast.error('Article not found!')
            }
        },
    }
})