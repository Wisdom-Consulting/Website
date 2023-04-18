import {defineStore} from 'pinia'
import axios from 'axios'
import {useConsultancyStore} from "@/stores/Consultancy";
import {useLocalStorage} from "@vueuse/core";
const isLoggedIn = useLocalStorage('isLoggedIn', () => false)

export const useAuthStore = defineStore('auth', {
    state: () => ({
        authUser: null,
        authRole: null,
        authError: '',
    }),
    getters: {
        user: (state) => state.authUser,
        role: (state) => state.authRole,
        errors: (state) => state.authError
    },
    actions: {
        async getUser() {
            const response = await axios.get("/api/user");
            this.authUser = response.data.user
            this.authRole = response.data.role
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
                    await this.getUser()
                    await useConsultancyStore().getArticles()
                    // set isLoggedIn in vueuse/useLocalStorage to true so that we can check if the user is logged in or not in the router
                    isLoggedIn.value=true
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
                    await this.getUser()
                    await useConsultancyStore().getArticles()
                    // set isLoggedIn in vueuse/useLocalStorage to true so that we can check if the user is logged in or not in the router
                    isLoggedIn.value=true
                    await this.router.push('/')
                }
            } catch (error) {
                this.authError = error.response.data.errors
                console.log(this.authError)
            }
        },
        async logOut() {
            await axios.post('/logout');
            this.authUser = null;
            this.authRole = null;
            isLoggedIn.value = false
            await this.router.push('/login')
        },
        async getToken() {
            await axios.get('/sanctum/csrf-cookie');
        }
    },
})