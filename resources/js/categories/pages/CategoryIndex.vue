<template>
    <div class="container">
        <div class="card m-5">
            <div class="card-header d-flex justify-content-between">
                <h2>Categorias</h2>
                <a href="/categories/create" class="btn btn-primary"> Crear categoria </a>
            </div>

            <div class="card-boyd p-4">
                <!-- Categories Table -->
                <categories-table />
            </div>
        </div>
    </div>
</template>

<script>
    import CategoriesTable from '../components/CategoriesTable.vue'
    export default {
        components: { CategoriesTable },
        data() {
            return {}
        }
    }
</script>
