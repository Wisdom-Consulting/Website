import {defineStore} from 'pinia'
import axios from 'axios'

export const useAuthStore = defineStore('auth', {
    state: () => ({
        authUser: null,
        authToken: null,
        authError: null,
    }),
    getters: {
        user: (state) => state.authUser,
        token: (state) => state.authToken,
        errors: (state) => state.authError,
    },
    actions: {
        async getUser() {
            const response = await axios.post("Users/getUser",
                {
                    'token': localStorage.getItem('token')
                });
            localStorage.setItem('ID', response.data.ID);
            this.authUser = response.data
        },
        async logIn(form) {
            this.authError = null;
            try {
                const response = await axios.post('api/user', {
                    email: form.email,
                    password: form.password
                });
                console.log(response)

                // await localStorage.setItem('token', response.data.token);
                // this.authUser = response.data;
                // await this.router.push('/');
            } catch (error) {
                this.authError = error.response.data.error
            }
        }
    },
    async signUp(form) {
        this.authError = null;
        try {
            const response = await axios.post('Users/signup', {
                name: form.firstName,
                email: form.lastName,
                password: form.email
            })
            this.authToken = response.data.Token
            await this.router.push('/signin')
        } catch (error) {
            this.authError = error.response.data.error
        }
    },
    async logOut() {
        localStorage.clear();
        this.authUser = null;
        await this.router.push('/signin')
    },
})