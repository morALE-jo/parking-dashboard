import { createRouter, createWebHistory} from 'vue-router'
import PlatesIndex from '../components/Plates/Index.vue'
import PlatesCreate from '../components/Plates/Create.vue'

const routes = [
    {
        path: '/', 
        name:'plate.index', 
        component: PlatesIndex
    },
    {
        path: '/plates/create', 
        name:'plate.create', 
        component: PlatesCreate
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;