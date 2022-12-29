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
import ProductShow from './products/pages/ProductShow.vue'
import CartIndex from './cart/pages/CartIndex.vue'
import CategoryIndex from './categories/pages/CategoryIndex.vue'
import CategoryCreate from './categories/pages/CategoryCreate.vue'

const app = createApp({
    components: {
        HomePage,
        CategoryPage,
        UserIndex,
        UserCreate,
        UserEdit,
        ProductIndex,
        ProductCreate,
        ProductEdit,
        ProductShow,
        CartIndex,
        CategoryIndex,
        CategoryCreate
    }
})

app.component('v-select', VueSelect).mount('#app')
