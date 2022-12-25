<template>
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
                    <button type="button" class="btn btn-info mx-2">Editar</button>
                    <button type="button" class="btn btn-danger mx-2">Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    import DataTable from 'datatables.net-bs5'

    export default {
        data() {
            return {
                usersArr: []
            }
        },
        props: ['users'],
        methods: {
            mountDataTable() {
                this.$nextTick(() => {
                    new DataTable('#usersTable')
                })
            }
        },
        mounted() {
            this.usersArr = this.users
            console.log(this.usersArr)
            this.mountDataTable()
        }
    }
</script>
