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
    component : Post
},
{
    path : '/user/posts',
    component : MyPosts
},
{
    path : '/user/messages',
    component : Messages
},
{
    path : '/user/account',
    component : AccountSettings
},


];


export default routes;