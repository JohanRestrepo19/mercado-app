<template>
    <div class="table-responsive">
        <table class="table" id="categoriesTable" @click="getEvent">
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
    import axios from 'axios'
    import DataTable from 'datatables.net-bs5'
    import { showConfirmationAlert } from '../../utils/notifications'

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
            //TODO: Cambiar la implementación de la eliminicación.
            async handleClickDelete(categoryId) {
                const confirmation = await showConfirmationAlert()
                if (confirmation) {
                    try {
                        await axios.delete(`/categories/delete/${categoryId}`)
                        this.dataTable.destroy()
                    } catch (error) {
                        console.error(error)
                    }
                }
                return
            },

            //TODO: Implementar la logica de edición.
            async handleClickEdit(categoryId) {
                console.log('estoy siendo editado', categoryId)
            },
            //TODO: Cambiar la request para la eliminicación.

            getEvent(event) {
                const button = event.target
                if (button.getAttribute('role') === 'edit') {
                    this.handleClickEdit(button.getAttribute('data-id'))
                } else {
                    this.handleClickDelete(button.getAttribute('data-id'))
                }
            }
        },
        mounted() {
            this.dataTable = this.mountDataTable()
        }
    }
</script>
