<template>
    <div class="container">
        <!-- Category row -->
        <category-card v-for="category in categories" :key="category.id" :category="category" />
    </div>
</template>

<script>
    import CategoryCard from './categories/components/CategoryCard.vue'
    export default {
        components: { CategoryCard },
        props: ['categories']
    }
</script>
