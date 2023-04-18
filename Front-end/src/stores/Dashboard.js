import {defineStore} from 'pinia'
import axios from 'axios'
import { useToast } from 'vue-toastification'

const toast = useToast()

export const useDashboardStore = defineStore('Dashboard', {
    state: () => ({
        questionCount: 1,
        Quizzes: [],
        Quiz: []

    }),
    getters: {
        steps: (state) => state.questionCount,
        quizzes: (state) => state.quizzes,
        quiz: (state) => state.quiz,
    },
    actions: {
        async loadUpdateQuizPage(quizId) {
            const response = await axios.get(`/api/quizzes/${quizId}`)
            this.Quiz = response.data
            // push to update quiz page
            await this.router.push('/dashboard/editQuiz')
        },
        async getDashboardData() {
            const response = await axios.get('/api/dashboard')
            return response.data
        },
        async assignRoleToUser(role, user) {
            const response = await axios.post('/api/dashboard/assign-role', {
                role,
                user
            })
            console.log(response.data)
        },
        async createQuiz(quiz) {
            try {
                const response = await axios.post('/api/quizzes', quiz)
                this.Quizzes.push(response.data)
                toast.success('Quiz created successfully')
            } catch (e) {
                toast(e.response.data.message)
            }
        },
        async updateQuiz(quiz) {
            try {
                const response = await axios.put(`/api/quizzes/${quiz.id}`, quiz)
                const index = this.quizzes.findIndex(item => item.id === quiz.id)
                this.quizzes.splice(index, 1, response.data)
                toast.success('Quiz updated successfully')
            } catch (e) {
                toast(e.response.data.message)
            }
        },
        async deleteQuiz(quiz) {
            try {
                await axios.delete(`/api/quizzes/${quiz.id}`)
                const index = this.quizzes.findIndex(item => item.id === quiz.id)
                this.quizzes.splice(index, 1)
                toast.success('Quiz deleted successfully')
            } catch (e) {
                toast(e.response.data.message)
            }
        },
    }
})