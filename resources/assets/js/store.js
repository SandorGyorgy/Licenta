import Vue from 'vue';
import Vuex from 'vuex';

import routes from'./routes'

Vue.use(Vuex);


export const store = new Vuex.Store({

    state:{
        token : null,
        userId : null,
        userEmail: null,
        userPhone : null
       
    },
    mutations:{
        authUser(state , userData){
            state.token = userData.token
            state.userId = userData.userId
            state.userEmail = userData.userEmail
            state.userPhone = userData.userPhone
          
        },

        logoutUser(state){
        state.token = null
        localStorage.removeItem('token');

        }
     
    },
    actions:{

        //Register action : sends the request to the register api and gets back the JWT commits it to the
        // store state 
        register({commit} , formData){
            axios.post('/api/user/register' , formData)
            .then( response => {
                commit('authUser' , {
                    token: response.data.token,
                    
                })

                localStorage.setItem('token' , response.data.token)
            })
            .catch(error => console.log(error))
        },
        // End of the register action

        //Logout action 
        logOut({commit}){
            commit('logoutUser')
            routes.replace('/map')
        
        },
        //Stay logged in untill logout 
        tryAutoLogin({commit}){
            const token = localStorage.getItem('token')
            if(!token){
                return
            }

            commit('authUser' , {
                token: token
            })

        },


        //Logi action : sends the user data to the api and gets back a JWT token 
        login({commit} , loginData){
            axios.post('/api/user/login' , loginData)
            .then( response => {  
                commit('authUser' , {
                    token: response.data.token

                })
                localStorage.setItem('token' , response.data.token)
            })
            .catch(error => console.log(error))
        },
        //End of the login action



    },
    getters:{
        isAuth(state){
            return state.token !== null
        }

    }

})