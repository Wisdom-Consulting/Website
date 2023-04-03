import {defineStore} from 'pinia'
import axios from 'axios'

export const useAuthStore = defineStore('auth', {
    state: () => ({
        authUser: null,
        authError: null,
    }),
    getters: {
        user: (state) => state.authUser,
        errors: (state) => state.authError
    },
    actions: {
        async getUser() {
            await axios.get("/api/user");
        },
        async logIn(form) {
            this.authError = null;
            try {
                await this.getToken();
                const response = await axios.post('/login', {
                    email: form.email,
                    password: form.password
                });
                if (response.status === 204) {
                this.authUser = await this.getUser()
                await this.router.push('/')
                } else {
                this.authError = response.data.message
                }
            } catch (error) {
                this.authError = error
            }
        },
        async signUp(form) {
            this.authError = null;
            try {
                await this.getToken();
               const {status} = await axios.post('/register', {
                    name: form.name,
                    email: form.email,
                    password: form.password,
                    password_confirmation: form.password_confirmation
                })
                if (status === 204) {   // 204 is the status code for successful registration
                this.authUser = await this.getUser()
                await this.router.push('/')
                }
            } catch (error) {
                this.authError = error.response.data.error
            }
        },
        async logOut() {
            await axios.post('/logout');
            await this.router.push('/signin')
        },
        async getToken() {
            await axios.get('/sanctum/csrf-cookie');
        }
    },
})