import './bootstrap'
import { createApp } from 'vue'
import HomePage from './HomePage.vue'
import CategoryPage from './categories/pages/CategoryPage.vue'
import UserIndex from './users/pages/UserIndex.vue'
import UserCreate from './users/pages/UserCreate.vue'

const app = createApp({
    components: {
        HomePage,
        CategoryPage,
        UserIndex,
        UserCreate
    }
})

app.mount('#app')
