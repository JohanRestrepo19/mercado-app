import './bootstrap'
import { createApp } from 'vue'
import HomePage from './HomePage.vue'

const app = createApp({
    components: {
        HomePage
    }
})

app.mount('#app')
