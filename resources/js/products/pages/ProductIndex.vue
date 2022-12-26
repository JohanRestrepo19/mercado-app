<template>
    <div class="container">
        <div class="card m-5">
            <div class="card-header d-flex justify-content-between">
                <h2>Productos</h2>
                <a href="" class="btn btn-primary"> Crear Producto </a>
            </div>

            <div class="card-boyd p-4">
                <!-- TODO: Poner el componente de products table -->
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
    mounted() { },
    props: ['products']
}
</script>
