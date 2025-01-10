import { createRouter, createWebHistory } from 'vue-router';

import Home from '../components/pages/admin/home.vue';
import Analytics from '../components/pages/admin/analytics.vue';
import AddQuiz from '../components/pages/admin/AddQuiz.vue';
import DisplayAllQuizs from '../components/pages/admin/DisplayAllQuizs.vue';





import Login from '../components/pages/auth/login.vue';
import NewUser from '../components/pages/auth/create_user.vue';
import DisplayAllUsers from '../components/pages/auth/displayUsersToAdmin.vue';


import UserHome from '../components/pages/user/Userhome.vue';

// Import other components as needed
const subdomain=localStorage.getItem('subdomain');

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
       
    },
    {
    path: '/Analytics',
    name: 'Analytics',
    component: Analytics
    },
    {
    path: '/NewQuiz',
    name: 'AddQuiz',
    component: AddQuiz
    }, 
    {
    path: '/DisplayAllQuizs',
    name: 'DisplayAllQuizs',
    component: DisplayAllQuizs
    },
   

    {
        path: '/login',
        name: 'Login',
        component: Login
    }, 
    {
        path: '/newuser',
        name: 'NewUser',
        component: NewUser
    },
    {
        path: '/DisplayAllUsers',
        name: 'DisplayAllUsers',
        component: DisplayAllUsers
    },
    
    {
    path: '/user',
    name: 'UserHome',
    component: UserHome
    },
        
    // Add other routes here
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
