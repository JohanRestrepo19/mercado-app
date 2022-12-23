<template>
    <div class="card mb-4">
        <a :href="`/categories/${category.id}`">
            <h2 class="card-header">{{ category.name }}</h2>
        </a>
        <div class="d-flex flex-wrap justify-content-evenly mb-4">
            <!-- Product Card -->
            <product-card v-for="product in category.products" :key="product.id" :product="product" :shortDesc="true" />
        </div>
    </div>
</template>

<script>
import ProductCard from '../../products/components/ProductCard.vue'

export default {
    components: { ProductCard },
    data() {
        return {}
    },
    mounted() { },
    props: ['category']
}
</script>
