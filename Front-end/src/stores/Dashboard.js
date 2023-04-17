import {defineStore} from 'pinia'
import axios from 'axios'
import { useToast } from 'vue-toastification'

const toast = useToast()

export const useDashboardStore = defineStore('Dashboard', {
    state: () => ({
        questionCount: 1,

    }),
    getters: {
        steps: (state) => state.questionCount,
    },
    actions: {
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
            const response = await axios.post('/api/quizzes', quiz)
            if (response.data.errors) {
                toast.error(response.data.errors)
                return
            }
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
    }
})