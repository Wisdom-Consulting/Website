import {defineStore} from 'pinia'
import axios from 'axios'

export const useConsultancyStore = defineStore('Consultancy', {
    state: () => ({
        articles: null,
    }),
    getters: {
        content: (state) => state.articles
    },
    actions: {
        async getArticles() {
            const response = await axios.get('/content');
            console.log(response.data)
            this.articles = response.data
            console.log(this.articles)
        }
    }
})