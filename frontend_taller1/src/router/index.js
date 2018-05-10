import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import MyApp from '@/components/MyApp'
import Login from '@/components/Login'
import Credentials from '@/services/Credentials.service.js'

Vue.use(Router)

let credentials = new Credentials()

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

router.beforeEach((to, from, next) => {
  if (credentials.isLogin()) {
    if (to.path === '/login') next({path: '/'})
    else next()
    next()
  } else {
    if (to.path === '/login') next()
    else next({path: '/login'})
  }
})

export default router
