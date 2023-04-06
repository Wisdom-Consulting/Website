import {defineStore} from 'pinia'
import axios from 'axios'

export const useConsultancyStore = defineStore('Consultancy', {
    state: () => ({
        articles: []
    }),
    getters: {
        getArticles: (state) => state.articles
    },
    actions: {
        async getArticles() {
            const response = await axios.get('/api/content');
            this.articles = response.data
        }
    }
})