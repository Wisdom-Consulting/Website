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
        async createQuiz(quiz) {
            const response = await axios.post('/api/quizzes', quiz)
            this.quizzes.push(response.data)
            toast.success('Quiz created successfully')
        },
        async updateQuiz(quiz) {
            const response = await axios.put(`/api/quizzes/${quiz.id}`, quiz)
            const index = this.quizzes.findIndex(item => item.id === quiz.id)
            this.quizzes.splice(index, 1, response.data)
            toast.success('Quiz updated successfully')
        },
        async deleteQuiz(quiz) {
            await axios.delete(`/api/quizzes/${quiz.id}`)
            const index = this.quizzes.findIndex(item => item.id === quiz.id)
            this.quizzes.splice(index, 1)
            toast.success('Quiz deleted successfully')
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