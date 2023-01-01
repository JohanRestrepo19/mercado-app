<template>
    <div class="container">
        <div class="card m-5">
            <div class="card-header text-bg-warning d-flex justify-content-between">
                <h2>Usuarios</h2>
                <a href="/users/create" class="btn btn-primary"> Crear usuario </a>
            </div>

            <div class="card-boyd p-4">
                <users-table :users="users" />
            </div>
        </div>
    </div>
</template>

<script>
    import UsersTable from '../components/UsersTable.vue'

    export default {
        components: {
            UsersTable
        },
        data() {
            return {}
        },
        props: ['users']
    }
</script>
