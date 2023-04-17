import {defineStore} from 'pinia'
import axios from 'axios'
import { useToast } from 'vue-toastification'

const toast = useToast()

export const useMySpaceStore = defineStore('MySpace', {
    state: () => ({
        quizzes: [],
        quizFields: [],
    }),
    getters: {
        quiz: (state) => state.quizzes,
        fields: (state) => state.quizFields,
    },
    actions: {
        async getQuizFields() {
            const response = await axios.get('/api/quiz_fields')
            this.quizFields = response.data
        },
        async getQuizzes() {
            const response = await axios.get('/api/quizzes')
            this.quizzes = response.data
            console.log(this.quizzes)
        },
        loadQuiz(quiz) {
            this.quiz = quiz
        },
        clicked() {
            toast('Clicked', {
                icon: '👋',
                toastClassName: "bg-[#003333] text-white opacity-90",
            })
        }
}
})