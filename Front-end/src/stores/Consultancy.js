import {defineStore} from 'pinia'
import axios from 'axios'
import { useToast } from 'vue-toastification'

const toast = useToast()



export const useConsultancyStore = defineStore('Consultancy', {
    state: () => ({
        articles: null,
        myArticles: null,
        Article: null,
        totalPages: null,
        Categories: null,
    }),
    getters: {
        content: (state) => state.articles,
        myContent: (state) => state.myArticles,
        article: (state) => state.Article,
        pages: (state) => state.totalPages,
        categories: (state) => state.Categories,
    },
    actions: {
        async getArticles(page) {
            const response = await axios.get('/content?page=' + page);
            this.totalPages = response.data.pagesCount
            console.log(response.data)
            this.articles = response.data.content.data
            console.log(this.articles)
        },
        async getMyArticles(page) {
            const response = await axios.get('/api/myContent?page=' + page);
            this.totalPages = response.data.pagesCount
            console.log(response.data)
            this.myArticles = response.data.content.data
            console.log(this.myArticles)
        },
        async deleteArticle(id) {
            try {
                const response = await axios.delete(`/api/content/${id}`);
                await this.router.push('/consulting')
                toast.success('Article deleted!')
            } catch (e) {
                toast.error('You can\'t delete this article!')
            }
        },
        async addArticle(data) {
            try {
                const response = await axios.post('/api/content', data);
                await this.router.push('/consulting')
                toast.success('Article added!')
            } catch (e) {
                await this.router.push('/mySpace')
                toast.error('You can\'t add this article!')
            }
        },
        async updateArticle(data) {
            try {
                const response = await axios.put(`/api/content/${data.id}`, data);
                await this.router.push('/mySpace')
                toast.success('Article updated!')
            } catch (e) {
                toast.error('You can\'t update this article!')
            }
        },
        async getCategories() {
            const response = await axios.get('/api/categories');
            this.Categories =  response.data
        },
        async loadArticle(id) {
            const response = await axios.get(`/api/content/${id}`);
            this.Article = response.data
            await this.router.push(`/consulting/editArticle/${id}`)
        },
        async filterArticles(category) {
            console.log(category)
            const response = await axios.get(`/content?category=${category}`);
            this.articles = response.data.content.data
        },
    }
})