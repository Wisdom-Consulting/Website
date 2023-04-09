import {defineStore} from 'pinia'
import axios from 'axios'

export const useDashboardStore = defineStore('Dashboard', {
    state: () => ({

    }),
    getters: {},
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
        }
    }
})