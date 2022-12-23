<template>
    <div class="card mb-4">
        <h2 class="card-header">{{ category.name }}</h2>
        <div class="d-flex flex-wrap justify-content-evenly mb-4">
            <!-- Product Card -->
            <product-card
                v-for="product in category.products"
                :key="product.id"
                :product="product"
                :shortDesc="true"
            />
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
        props: ['category']
    }
</script>
