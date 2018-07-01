import { store } from './store'

import HomeComponent from './components/HomeComponent.vue'
import MapComponent from './components/MapComponent.vue'
import Login from './components/AuthComponents/Login.vue'
import Register from './components/AuthComponents/Register.vue'
import AccountSettings from './components/AuthComponents/AccountSettings.vue'
import Messages from './components/AuthComponents/Messages.vue'
import MyPosts from './components/AuthComponents/MyPosts.vue'
import Post from './components/AuthComponents/Post.vue'
import ViewPost from './components/SinglePost.vue'
import EditPost from './components/EditPost.vue'


const routes = [
    {
        path: '/',
        component: HomeComponent,
        name: 'home'
    },
    {
        path: '/map',
        component: MapComponent,
        name: 'map'

    },
    {
        path: '/post/:id',
        component: ViewPost,
        name: 'post'
        

    },
    {
        path: '/edit/:id',
        component: EditPost,
        name: 'editPost',
        beforeEnter(to, from, next) {
            if (store.state.router) {
                next()
            } else if (store.state.token) {
                next()
            } else {
                next('/login')
            }
        }
    },
    {
        path: '/login',
        component: Login,
        name: 'login'
    },
    {
        path: '/register',
        component: Register
    },
    {
        path: '/user/post',
        component: Post,
        beforeEnter(to, from, next) {
            if (store.state.router) {
                next()
            } else if (store.state.token) {
                next()
            } else {
                next('/login')
            }
        }
    },
    {
        path: '/user/posts',
        component: MyPosts,
        beforeEnter(to, from, next) {
            if (store.state.router) {
                next()
            } else if (store.state.token) {
                next()
            } else {
                next('/login')
            }
        }

    },
    {
        path: '/user/messages',
        component: Messages,
        beforeEnter(to, from, next) {
            if (store.state.router) {
                next()
            } else if (store.state.token) {
                next()
            } else {
                next('/login')
            }
        }
    },
    {
        path: '/user/account',
        component: AccountSettings,
        beforeEnter(to, from, next) {
            if (store.state.router) {
                next()
            } else if (store.state.token) {
                next()
            } else {
                next('/login')
            }
        }
    },


];


export default routes;