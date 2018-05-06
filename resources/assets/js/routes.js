import {store} from './store'

import HomeComponent from './components/HomeComponent.vue'
import MapComponent from './components/MapComponent.vue'
import Login from './components/AuthComponents/Login.vue'
import Register from './components/AuthComponents/Register.vue'
import AccountSettings from './components/AuthComponents/AccountSettings.vue'
import Messages from './components/AuthComponents/Messages.vue'
import MyPosts from './components/AuthComponents/MyPosts.vue'
import Post from './components/AuthComponents/Post.vue'


const routes = [
{
    path : '/' , 
    component: HomeComponent 
  
},
{
    path: '/map',
    component : MapComponent
 
},
{
    path: '/login',
    component : Login
},
{
    path : '/register',
    component : Register
},
{
    path : '/user/post',
    component : Post,
    beforeEnter(to, from, next) {
     if(store.state.token){
         next()
     } else {
         next('/login')
     }  
    }
},
{
    path : '/user/posts',
    component : MyPosts,
    beforeEnter(to, from, next) {
     if(store.state.token){
         next()
     } else {
         next('/login')
     }  
    }
  
},
{
    path : '/user/messages',
    component : Messages,
    beforeEnter(to, from, next) {
     if(store.state.token){
         next()
     } else {
         next('/login')
     }  
    }
},
{
    path : '/user/account',
    component : AccountSettings,
    beforeEnter(to, from, next) {
     if(store.state.token){
         next()
     } else {
         next('/login')
     }  
    }
},


];


export default routes;