import Vue from 'vue'
import Router from 'vue-router'
import firstPage from './components/pages/myFirstPage'

Vue.use(Router)

const routes = [
	{
		path: '/my-new-vue-route',
		component: firstPage
	}	
]

export default new Router({
	mode: 'history',
	routes
})