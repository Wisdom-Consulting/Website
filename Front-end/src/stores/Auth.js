import {defineStore} from 'pinia'
import axios from 'axios'
import Cookies from 'js-cookie'

export const useAuthStore = defineStore('auth', {
    state: () => ({
        authUser: null,
        authError: ''
    }),
    getters: {
        user: (state) => state.authUser,
        errors: (state) => state.authError
    },
    actions: {
        async getUser() {
            await this.getToken();
            this.authUser = await axios.get("/api/user", {
                headers: {
                    'X-CSRF-TOKEN': Cookies.get('XSRF-TOKEN')
                }
            });
        },
        async logIn(form) {
            this.authError = null;
            try {
                await this.getToken();
                const response = await axios.post('/login', {
                    email: form.email,
                    password: form.password
                });
                console.log(response)
                // return
                if (response.status === 204) {
                    this.authUser = await this.getUser()
                    await this.router.push('/')
                } else {
                    this.authError = response.data.message
                }
            } catch (error) {
                this.authError = error.response.data.message
            }
        },
        async signUp(form) {
            if (form.password !== form.password_confirmation || form.password.length < 8 || form.password_confirmation.length < 0) {
                return
            }
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
                this.authError = error.response.data.errors
                console.log(this.authError)
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