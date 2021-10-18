import Register from './components/Auth/Register'
import Login from './components/Auth/Login'
import Home from './components/Pages/Home'
import Dashboard from './components/Auth/Dashboard'
import NotFound from './components/Pages/NotFound'

export default {
    routes: [
        {
            path: '*',
            component: NotFound
        },
        {
            path: '/',
            component: Home,
            name: 'Home',
           
        },
        {
            path: '/register',
            component: Register,
            name: 'Register',
           
        },
        {
            path: '/login',
            component: Login,
            name: 'Login',
            
        },
        {
            path: '/dashboard',
            component: Dashboard,
            name: 'Dashboard',
            
             //authenticate user
             beforeEnter: (to, from, next) => {
                axios.get('api/authenticated')
                .then(() => {
                    next()
                }).catch(()=>{
                    return next({name: 'Login'});
                })
            }
        },


        
    ]
}
   