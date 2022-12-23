import './bootstrap'
import { createApp } from 'vue'
import HomePage from './HomePage.vue'
import CategoryPage from './categories/pages/CategoryPage.vue'
import UserIndex from './users/pages/UserIndex.vue'

const app = createApp({
    components: {
        HomePage,
        CategoryPage,
        UserIndex
    }
})

app.mount('#app')
