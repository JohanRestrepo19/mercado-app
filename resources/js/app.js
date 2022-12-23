import './bootstrap'
import { createApp } from 'vue'
import HomePage from './HomePage.vue'
import CategoryPage from './categories/pages/CategoryPage.vue'

const app = createApp({
    components: {
        HomePage,
        CategoryPage
    }
})

app.mount('#app')
