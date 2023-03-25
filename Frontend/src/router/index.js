import { createRouter, createWebHistory } from 'vue-router'


import ComponentCreate from '../components/ComponentCreate.vue'
import ComponentList from '../components/ComponentList.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: ComponentList
  },
  
  {
    path: '/create',
    name: 'Create',
    component: ComponentCreate
  },
  
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router