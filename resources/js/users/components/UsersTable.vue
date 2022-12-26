<template>
    <table class="table table-responsive" id="usersTable">
        <thead>
            <tr>
                <th>id</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in usersArr" :key="user.id">
                <td>{{ user.id }}</td>
                <td>{{ user.number_id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.last_name }}</td>
                <td>{{ user.email }}</td>
                <td class="d-flex">
                    <a class="btn btn-info mx-2" :href="`/users/${user.id}/edit`">Editar</a>
                    <button
                        @click="handleClickDelete(user.id)"
                        type="button"
                        class="btn btn-danger mx-2"
                    >
                        Eliminar
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    import DataTable from 'datatables.net-bs5'
    import Swal from 'sweetalert2'
    import axios from 'axios'

    export default {
        data() {
            return {
                usersArr: [],
                dataTable: null
            }
        },
        props: ['users'],
        methods: {
            mountDataTable() {
                this.$nextTick(() => {
                    this.dataTable = new DataTable('#usersTable')
                })
            },
            async handleClickDelete(userId) {
                const confirmation = await this.showConfirmationAlert()
                if (confirmation) {
                    this.usersArr = this.usersArr.filter(user => user.id !== userId)
                    this.deleteUserRequest(userId)
                }
                return
            },
            async showConfirmationAlert() {
                const result = await Swal.fire({
                    title: 'Estás seguro?',
                    text: 'No podrás revertir la acción',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar'
                })
                if (result.isConfirmed) return true
                return false
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
            this.usersArr = this.users
            this.mountDataTable()
        }
    }
</script>
