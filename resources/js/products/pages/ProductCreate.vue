<template>
    <div class="container py-4">
        <product-form :categories="categories" />
    </div>
</template>

<script>
    import ProductForm from '../components/ProductForm.vue'
    export default {
        components: { ProductForm },
        data() {
            return {}
        },
        props: ['categories']
    }
</script>
