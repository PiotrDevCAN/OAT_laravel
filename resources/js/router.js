import Vue from 'vue'
import Router from 'vue-router'
import firstPage from './components/pages/myFirstVuePage'

Vue.use(Router)

const routes = [	
	{
		path: '/',
		component: firstPage,
	},
	{
		path: '/vue',
		component: firstPage,
	},
	{
		path: '/my-new-vue-route',
		name: firstPage,
		component: firstPage
	}	
]

export default new Router({
	mode: 'history',
	routes
})