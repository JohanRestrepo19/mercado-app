<template>
    <div class="table-responsive">
        <table class="table" id="categoriesTable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</template>

<script>
    /* import axios from 'axios' */
    import DataTable from 'datatables.net-bs5'
    /* import { showConfirmationAlert } from '../../utils/notifications' */

    export default {
        data() {
            return {
                dataTable: null
            }
        },
        methods: {
            mountDataTable() {
                this.$nextTick(() => {
                    // NOTE: Posible breking point
                    return new DataTable('#categoriesTable', {
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: '/categories/categoriesForDataTable'
                        },
                        columns: [
                            { data: 'id' },
                            { data: 'name' },
                            {
                                data: 'actions',
                                orderable: false,
                                searchable: false
                            }
                        ]
                    })
                })
            },
            //TODO: Cambiar la implementación de la eliminicación
            async handleClickDelete() {},
            //TODO: Cambiar la request para la eliminicación
            async deleteProductRequest() {}
        },
        mounted() {
            this.dataTable = this.mountDataTable()
        }
    }
</script>
