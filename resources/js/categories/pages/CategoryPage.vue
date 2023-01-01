<template>
    <div class="container">
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
