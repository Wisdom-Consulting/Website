import { defineStore } from 'pinia'
import axios from 'axios'
export const useAuthStore = defineStore('auth', {
  state: () => ({
    authUser: null,
    authToken: null,
    authError: null,
    tickets: null
  }),
  getters: {
    user: (state) => state.authUser,
    token: (state) => state.authToken,
    errors: (state) => state.authError,
    ticket: (state) => state.tickets
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
    async logIn(form){
      this.authError = null;
      if(form.token.length <= 15){
        this.authError = 'Token must be at least 15 character';
      }else {
        try {
          const response = await axios.post('Users/signin', {
            token: form.token
          });

          localStorage.setItem('token', form.token);
          this.authUser = response.data;
          await this.router.push('/');
        }catch (error){
          this.authError = error.response.data.error
        }
      }
    },
    async signUp(form) {
      this.authError = null;
      try {
        const response = await axios.post('Users/signup', {
          firstName: form.firstName,
          lastName: form.lastName,
          email: form.email
        })
        this.authToken = response.data.Token
        this.copy(this.authToken)
        await this.router.push('/signin')
      }catch (error){
        this.authError = error.response.data.error
      }
    },
    async logOut(){
      localStorage.clear();
      this.authUser = null;
      await this.router.push('/signin')
    },
  }
})