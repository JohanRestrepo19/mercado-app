<template>
    <div class="table-responsive">
        <table class="table" id="usersTable">
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
                        <a class="btn btn-warning mx-2" :href="`/users/${user.id}/edit`">Editar</a>
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
    </div>
</template>

<script>
    import DataTable from 'datatables.net-bs5'
    import axios from 'axios'
    import { showConfirmationAlert } from '../../utils/notifications'

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
                const confirmation = await showConfirmationAlert()
                if (confirmation) {
                    this.usersArr = this.usersArr.filter(user => user.id !== userId)
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
            this.usersArr = this.users
            this.mountDataTable()
        }
    }
</script>
