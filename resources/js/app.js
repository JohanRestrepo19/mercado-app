import './bootstrap'
import { createApp } from 'vue'
import VueSelect from 'vue-select'
import HomePage from './HomePage.vue'
import CategoryPage from './categories/pages/CategoryPage.vue'
import UserIndex from './users/pages/UserIndex.vue'
import UserCreate from './users/pages/UserCreate.vue'
import UserEdit from './users/pages/UserEdit.vue'
import ProductIndex from './products/pages/ProductIndex.vue'
import ProductCreate from './products/pages/ProductCreate.vue'
import ProductEdit from './products/pages/ProductEdit.vue'

const app = createApp({
    components: {
        HomePage,
        CategoryPage,
        UserIndex,
        UserCreate,
        UserEdit,
        ProductIndex,
        ProductCreate,
        ProductEdit
    }
})

app.component('v-select', VueSelect).mount('#app')
