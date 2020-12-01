import Vue from 'vue'
import Router from 'vue-router'

import firstPage from './components/pages/myFirstVuePage'
import secondPage from './components/pages/myFirstVuePage'

Vue.use(Router)

const routes = [
	{
		path: '/OAT_laravel/vue',
		name: vue,
		component: firstPage,
	},
	{
		path: '/OAT_laravel/my-new-vue-route',
		name: firstPage,
		component: firstPage
	},
	{
		path: '/OAT_laravel/my-new-vue-route-2',
		name: secondPage,
		component: secondPage
	}	
]

export default new Router({
	mode: 'history',
	routes
})