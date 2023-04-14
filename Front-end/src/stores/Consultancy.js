import {defineStore} from 'pinia'
import axios from 'axios'

export const useConsultancyStore = defineStore('Consultancy', {
    state: () => ({
        articles: null,
        totalPages: null,
    }),
    getters: {
        content: (state) => state.articles,
        pages: (state) => state.totalPages,
    },
    actions: {
        async getArticles(page) {
            const response = await axios.get('/content?page=' + page);
            this.totalPages = response.data.pagesCount
            console.log(response.data)
            this.articles = response.data.content.data
            console.log(this.articles)
        }
    }
})