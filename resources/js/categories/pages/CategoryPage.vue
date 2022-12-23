<template>
    <div class="container py-4">
        <!-- Category  -->
        <category-card :category="category" />
    </div>
</template>

<script>
    import CategoryCard from '../components/CategoryCard.vue'
    export default {
        components: { CategoryCard },
        data() {
            return {}
        },
        props: ['category']
    }
</script>
