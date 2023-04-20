import {defineStore} from 'pinia'
import axios from 'axios'
import { useToast } from 'vue-toastification'

const toast = useToast()

export const useMySpaceStore = defineStore('MySpace', {
    state: () => ({
        quizzes: [],
        Quiz: [],
        quizFields: [],
        Levels: [],
        SelectedField: '',
    }),
    getters: {
        quiz: (state) => state.quizzes,
        test: (state) => state.Quiz,
        fields: (state) => state.quizFields,
        levels: (state) => state.levels,
        selectedField: (state) => state.selectedField,
    },
    actions: {
        async getQuizFields() {
            const response = await axios.get('/api/quiz_fields')
            this.quizFields = response.data
        },
        async getLevels() {
            const response = await axios.get('/api/levels')
            this.Levels = response.data
            console.log(this.Levels)
        },
        async getQuizzes(field) {
            const response = await axios.get('/api/quizzes?field=' + field)
            this.quizzes = response.data
            console.log(this.quizzes)
        },
        loadQuiz(quiz) {
            this.quiz = quiz
        },
        async loadTest(quiz) {
            try {
                const response = await axios.get(`/api/quizzes/${quiz}`)
                this.Quiz = response.data
                await this.router.push('/quiz/test')
            } catch (error) {
                toast.error('Error loading quiz')
            }
        },
}
})