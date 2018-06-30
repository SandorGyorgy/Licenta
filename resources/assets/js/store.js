import Vue from 'vue';
import Vuex from 'vuex';
import routes from './routes';
import axiosAuth from './axios-auth';

Vue.use(Vuex);


export const store = new Vuex.Store({

    state: {
        token: null,
        userName: null,
        userId: null,
        userEmail: null,
        userPhone: null,
        router: localStorage.getItem('token'),
        profilePic: null

    },

    mutations: {
        
        authUser(state, userData) {
            state.token = userData.token
            state.userId = userData.userId
            state.userName = userData.userName
            state.userEmail = userData.userEmail
            state.userPhone = userData.userPhone
            state.profilePic = userData.profilePic

        },

        logoutUser(state) {
            state.token = null,
                state.userName = null,
                state.userId = null,
                state.userEmail = null,
                state.userPhone = null,
                state.profilePic = null

            localStorage.removeItem('token');
            localStorage.removeItem('userName');
            localStorage.removeItem('userId');
            localStorage.removeItem('userEmail');
            localStorage.removeItem('userPhone');
            localStorage.removeItem('profilePic');
        }

    },

    actions: {


       
        register(formData) {
            axios.post('/api/user/register', formData)
                .catch(error => console.log(error))
        },
      

        //Logout action 
        logOut({ commit }) {
            axiosAuth.post('/user/logout')
            commit('logoutUser')
        },

        
        //Stay logged in untill logout 
        tryAutoLogin({ commit }) {
            const token = localStorage.getItem('token')
            const userId = localStorage.getItem('userId')
            const userName = localStorage.getItem('userName')
            const userEmail = localStorage.getItem('userEmail')
            const userPhone = localStorage.getItem('userPhone')
            const profilePic = localStorage.getItem('profilePic')
            if (!token) {
                return
            }

            commit('authUser', {
                token: token,
                userId: userId,
                userName: userName,
                userEmail: userEmail,
                userPhone: userPhone,
                profilePic: profilePic
            })

        },


        //Logi action : sends the user data to the api and gets back a JWT token 
        login({dispatch }, loginData) {
            axios.post('/api/user/login', loginData)
                .then(response => {
                    localStorage.setItem('token', response.data.token)
                    dispatch('authUserData')
                })
                .catch(error => console.log(error))
        },
        //End of the login action


        authUserData({ commit }) {
            const token = localStorage.getItem('token')
            axios({
                method: 'get',
                url: '/api/user',
                headers: { 'Authorization': `Bearer ${token}` }
            })
                .then(response => {
                    //sending the data to the aplication state
                    commit('authUser', {
                        userId: response.data.id,
                        userName: response.data.name,
                        userEmail: response.data.email,
                        userPhone: response.data.phone,
                        token: localStorage.getItem('token'),
                        profilePic: response.data.profile_picture
                    })
                    //saving the user data to the local storage 
                    localStorage.setItem('userId', response.data.id)
                    localStorage.setItem('userName', response.data.name)
                    localStorage.setItem('userEmail', response.data.email)
                    localStorage.setItem('userPhone', response.data.phone)
                    localStorage.setItem('profilePic' , response.data.profile_picture)
                    location.reload()
                })
                .catch(error => console.log(error))
        },




    },
    
    getters: {
        isAuth(state) {
            return state.token !== null
        }

    }

})