import NavbarComponent from './components/LayoutComponents/NavbarComponent.vue'
import HomeComponent from './components/HomeComponent.vue'
import MapComponent from './components/MapComponent.vue'
import LoginComponent from './components/AuthComponents/LoginComponent.vue'
import RegisterComponent from './components/AuthComponents/RegisterComponent.vue'


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
    component : LoginComponent
},
{
    path : '/register',
    component : RegisterComponent
}


];


export default routes;