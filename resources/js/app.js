import './bootstrap'
import { createApp } from 'vue'
import VueSelect from 'vue-select'

import HomePage from './HomePage.vue'
import { CartIndex } from './cart'
import { CategoryIndex, CategoryEdit, CategoryPage, CategoryCreate } from './categories'
import { ProductCreate, ProductEdit, ProductIndex, ProductShow } from './products'
import { UserIndex, UserCreate, UserEdit } from './users'

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
        CategoryCreate,
        CategoryEdit
    }
})

app.component('v-select', VueSelect).mount('#app')
