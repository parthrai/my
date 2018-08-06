import Listusers from './components/ListUsers/ListUsers';
import Home from './components/HomeComponent';



const routes = [
    { path: '/', component: Home },

    { path: '/list/:id', component: Listusers },

    { path: '*', redirect: '/list' },
];



export default routes;