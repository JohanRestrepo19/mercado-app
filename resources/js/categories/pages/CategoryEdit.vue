<template>
    <div class="container">
        <category-form :creating="false" :category-info="categoryInfo" />
    </div>
</template>

<script>
    import CategoryForm from '../components/CategoryForm.vue'
    export default {
        components: { CategoryForm },
        data() {
            return {}
        },
        props: {
            categoryInfo: { type: Object, required: true }
        }
    }
</script>
