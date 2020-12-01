import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)
import firstPage from './components/pages/myFirstVuePage'
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