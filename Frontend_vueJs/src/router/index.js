// src/router/index.js
import { createRouter, createWebHistory } from 'vue-router'
import NotFound from '../views/NotFound.vue'
import CnnView from '../views/CnnView.vue'
import VivaView from '../views/VivaNews.vue'

const routes = [
  {
    path: '/:pathMatch(.*)*',
    name: 'NotFound',
    component: NotFound
  },
  {
    path: '/cnn/indonesia',
    name: 'NotFound',
    component: CnnView
  },
  {
    path: '/cnbc/indonesia',
    name: 'viva',
    component: VivaView
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router