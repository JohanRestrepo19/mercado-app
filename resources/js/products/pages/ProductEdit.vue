<template>
    <div class="container py-4">
        <product-form :creating="false" :categories="categories" :productInfo="product" />
    </div>
</template>

<script>
    import ProductForm from '../components/ProductForm.vue'
    export default {
        components: { ProductForm },
        data() {
            return {}
        },
        props: ['categories', 'product']
    }
</script>
