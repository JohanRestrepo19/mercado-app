<template>
    <!-- Erorres -->
    <errors-alert v-if="errors" :errors="errors" />

    <div class="card">
        <div class="card-header">
            <h1>
                <span>{{ this.action }}</span>
                Usuario
            </h1>
        </div>
        <div class="card-body">
            <!-- Create user form -->
            <form class="mx-4" @submit.prevent="handleSubmit" ref="form">
                <!-- Nombre -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        id="name"
                        v-model="form.name"
                    />
                </div>

                <!-- Apellido -->
                <div class="mb-3">
                    <label for="last_name" class="form-label">Apellido</label>
                    <input
                        type="text"
                        name="last_name"
                        class="form-control"
                        id="last_name"
                        v-model="form.last_name"
                    />
                </div>

                <!-- Number Id -->
                <div class="mb-3">
                    <label for="number_id" class="form-label">Cédula</label>
                    <input
                        type="number"
                        name="number_id"
                        class="form-control"
                        id="number_id"
                        v-model="form.number_id"
                    />
                </div>

                <!-- Category Id -->
                <div class="mb-3">
                    <label for="role" class="form-label">Rol</label>
                    <v-select
                        :options="roles"
                        label="name"
                        :reduce="role => role.name"
                        v-model="form.role"
                    />
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electronico</label>
                    <input type="email" class="form-control" id="email" v-model="form.email" />
                </div>

                <!-- Contraseña -->
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        v-model="form.password"
                    />
                </div>

                <!-- Contraseña -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label"
                        >Confirmar contraseña</label
                    >
                    <input
                        type="password"
                        class="form-control"
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                    />
                </div>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-primary" href="/users">Volver</a>
                    <button class="btn btn-success">{{ this.action }} usuario</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import ErrorsAlert from '../../components/ErrorsAlert.vue'
    import { showToastNotification } from '../../utils/notifications'
    const initialForm = {
        name: '',
        last_name: '',
        number_id: '',
        role: '',
        email: '',
        password: '',
        password_confirmation: ''
    }

    export default {
        components: { ErrorsAlert },
        computed: {
            action() {
                return this.creating ? 'Crear' : 'Editar'
            }
        },
        data() {
            return {
                form: {},
                errors: null
            }
        },
        methods: {
            async handleSubmit() {
                this.errors = null
                try {
                    if (this.creating) {
                        await axios.post('/users/create', this.form)
                        showToastNotification('Usuario Creado!')
                        this.$refs.form.reset()
                    } else {
                        await axios.post(`/users/${this.userInfo.id}`, this.form)
                        showToastNotification('Usuario Editado!')
                    }
                } catch (error) {
                    this.errors = error.response.data.errors
                }
            }
        },
        mounted() {
            this.form = { ...this.userInfo, role: this.userInfo.roles?.[0].name || '' }
        },
        props: {
            creating: {
                type: Boolean,
                default: true
            },
            userInfo: {
                type: Object,
                default: initialForm
            },
            roles: { default: [] }
        }
    }
</script>
