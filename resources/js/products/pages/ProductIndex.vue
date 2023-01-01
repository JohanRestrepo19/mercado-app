<template>
    <div class="container">
        <div class="card m-5">
            <div class="card-header text-bg-warning d-flex justify-content-between">
                <h2>Productos</h2>
                <a href="/products/create" class="btn btn-primary"> Crear Producto </a>
            </div>

            <div class="card-boyd p-4">
                <products-table :products="products" />
            </div>
        </div>
    </div>
</template>

<script>
    import ProductsTable from '../components/ProductsTable.vue'
    export default {
        components: { ProductsTable },
        data() {
            return {}
        },
        mounted() {},
        props: ['products']
    }
</script>
