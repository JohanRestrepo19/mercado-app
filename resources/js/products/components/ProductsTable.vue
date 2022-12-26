<template>
    <table class="table table-responsive" id="productsTable">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Descripción</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="product in productsArr" :key="product.id">
                <td>{{ product.id }}</td>
                <td>{{ product.name }}</td>
                <td>{{ product.category_id }}</td>
                <td>{{ product.short_description }}</td>
                <td>{{ product.price }}</td>
                <td>{{ product.stock }}</td>
                <td class="d-flex">
                    <a class="btn btn-info mx-2" :href="`/products/${product.id}/edit`">Editar</a>
                    <button @click="handleClickDelete(product.id)" type="button" class="btn btn-danger mx-2">
                        Eliminar
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import DataTable from 'datatables.net-bs5'
import axios from 'axios'
import { showConfirmationAlert } from '../../utils/notifications'

export default {
    data() {
        return {
            productsArr: [],
            dataTable: null
        }
    },
    props: ['products'],
    methods: {
        mountDataTable() {
            this.$nextTick(() => {
                // NOTE: Posible breking point
                return new DataTable('#productsTable')
            })
        },
        async handleClickDelete(userId) {
            const confirmation = await showConfirmationAlert()
            if (confirmation) {
                this.usersArr = this.productsArr.filter(user => user.id !== userId)
                this.deleteUserRequest(userId)
            }
            return
        },
        async deleteUserRequest(userId) {
            try {
                await axios.delete(`/users/delete/${userId}`)
            } catch (error) {
                console.error(error)
            }
        }
    },
    mounted() {
        this.productsArr = this.products
        this.dataTable = this.mountDataTable()
        console.log(this.productsArr)
    }
}
</script>
