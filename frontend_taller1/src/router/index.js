import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import MyApp from '@/components/MyApp'
import Login from '@/components/Login'

Vue.use(Router)

const router = new Router({
  routes: [
    {
      path: '/',
      name: 'MyApp',
      component: MyApp,
      children: [{
        path: '/',
        component: HelloWorld
      }]
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    }
  ]
})

export default router
