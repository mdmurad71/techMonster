import { createWebHistory, createRouter } from "vue-router";
import * as VueRouter from "vue-router";

import home from './component/Home'
import Login from './component/Login'
import postThread from './component/PostThread'
import register from './component/register'


export const routes= [

    {
        path: '/',
        component: home,
        name: 'home'
    },
    {
        path: '/login',
        component: Login,
        name: 'login'
    },

    {
        path: '/addThread',
        component: postThread,
        name: 'postThread',
        
    },

    {
        path: '/register',
        component: register,
        
    },

  
];
// const router = createRouter({
//     history: createWebHistory(),
//     routes,
//   });
  const router = VueRouter.createRouter({
    history: VueRouter.createWebHashHistory(),
    routes, 
  })



  
  export default router;