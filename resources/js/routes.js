import { createWebHistory, createRouter } from "vue-router";
import * as VueRouter from "vue-router";

import home from './component/Home'
import Login from './component/Login'
// import Reserve from './component/Reserve'
// import ReserveList from './component/ReserveList'


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

    // {
    //     path: '/reserve/:id',
    //     component: Reserve,
    //     name: 'reserve',
        
    // },

    // {
    //     path: '/list',
    //     component: ReserveList,
        
    // },

  
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