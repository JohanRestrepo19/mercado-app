import './bootstrap'
import { createApp } from 'vue'
import HomePage from './HomePage.vue'
import CategoryPage from './categories/pages/CategoryPage.vue'
import UserIndex from './users/pages/UserIndex.vue'
import UserCreate from './users/pages/UserCreate.vue'
import UserEdit from './users/pages/UserEdit.vue'
import ProductIndex from './products/pages/ProductIndex.vue'
import ProductCreate from './products/pages/ProductCreate.vue'

const app = createApp({
    components: {
        HomePage,
        CategoryPage,
        UserIndex,
        UserCreate,
        UserEdit,
        ProductIndex,
        ProductCreate
    }
})

app.mount('#app')
