import { createRouter, createWebHistory } from 'vue-router'

import DepartmentEdit from '../views/Department/Edit.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [

    {
      path: '/',
      name: 'home',
      component: () => import("../views/HomeView.vue")
    },
    {
      path: '/departmets',
      name: 'departments.index',
      component: () => import("../views/Department/Index.vue")
    },
    {
      path: '/departmets/create',
      name: 'departments.create',
      component: () => import("../views/Department/Create.vue")
    },

    {
      path: '/departmets/:id/edit',
      name: 'departments.edit',
      component: DepartmentEdit,
      props: true
    },
    {
      path: '/departmets/:id/show',
      name: 'departments.show',
      component: () => import("../views/Department/Show.vue"),
      props: true
    },

    {
      path: '/users',
      name: 'users.index',
      component: () => import("../views/User/Index.vue")
    },
    {
      path: '/users/create',
      name: 'users.create',
      component: () => import("../views/User/Create.vue")
    },

    {
      path: '/users/:id/edit',
      name: 'users.edit',
      component: () => import("../views/User/Edit.vue"),
      props: true
    },
    {
      path: '/users/:id/show',
      name: 'users.show',
      component: () => import("../views/User/Show.vue"),
      props: true
    },
    // {
    //   path: '/about',
    //   name: 'about',
    //   // route level code-splitting
    //   // this generates a separate chunk (About.[hash].js) for this route
    //   // which is lazy-loaded when the route is visited.
    //   component: () => import('../views/AboutView.vue')
    // }
  ]
})

export default router
