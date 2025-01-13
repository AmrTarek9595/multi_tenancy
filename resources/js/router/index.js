import { createRouter, createWebHistory } from 'vue-router';

import Home from '../components/pages/admin/home.vue';
import Analytics from '../components/pages/admin/analytics.vue';
import AddQuiz from '../components/pages/admin/AddQuiz.vue';
import DisplayAllQuizs from '../components/pages/admin/DisplayAllQuizs.vue';





import Login from '../components/pages/auth/login.vue';
import NewUser from '../components/pages/auth/create_user.vue';
import DisplayAllUsers from '../components/pages/auth/displayUsersToAdmin.vue';


import UserHome from '../components/pages/user/Userhome.vue';
import UserQuizz from '../components/pages/user/DisplayQuizz.vue';
import UserAnalytics from '../components/pages/user/analytics.vue';


const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
       
    },
    {
    path: '/analytics',
    name: 'Analytics',
    component: Analytics
    },
    {
    path: '/newQuiz',
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
        component: UserHome, 
       },
       {
        path: '/user/displayQuizz', 
        name: 'SolveQuiz', 
        component: UserQuizz, 
       },
       {
        path: '/user/analytics', 
        name: 'User Analytics', 
        component: UserAnalytics, 
       }
        
    // Add other routes here
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});
router.beforeEach((to, from, next) => 
    { 
        if (localStorage.getItem('type')=="user" ||localStorage.getItem('type')=="User") { 

                const restrictedPaths = ['/','/analytics', '/newQuiz','/DisplayAllQuizs','/newuser','/DisplayAllUsers']; 
                if (restrictedPaths.includes(to.path)) { 
                    next(false); 
                    window.location.href="/user"
                    } 
                    else 
                    { 
                        next();
                        
                    } } 
        else { 
            next(); 
        }
    }
);// Allow navigation if URL doesn't contain /user

export default router;
