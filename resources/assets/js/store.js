import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);


export const store = new Vuex.Store({

    state:{
        token : null,
       
    },
    mutations:{
        authUser(state , userData){
            state.token = userData.token
          
        },
     
    },
    actions:{

        //Register action : sends the request to the register api and gets back the JWT commits it to the
        // store state 
        register({commit} , formData){
            axios.post('/api/user/register' , formData)
            .then( response => {
                commit('authUser' , {
                    token: response.data.token
                    
                })
            })
            .catch(error => console.log(error))
        },
        // End of the register action


        //Logi action : sends the user data to the api and gets back a JWT token 
        login({commit} , loginData){
            axios.post('/api/user/login' , loginData)
            .then( response => {  
                commit('authUser' , {
                    token: response.data.token

                })
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