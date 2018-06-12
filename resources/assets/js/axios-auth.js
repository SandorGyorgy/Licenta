import axios from 'axios'

const instance = axios.create({
    baseURL : 'http://licenta.test/api'

})
    const token = localStorage.getItem('token') 
    instance.defaults.headers.Authorization =  `Bearer ${token}`

export default instance

