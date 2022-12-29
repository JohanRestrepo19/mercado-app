<template>
    <!-- Erorres -->
    <errors-alert v-if="errors" :errors="errors" />

    <div class="card">
        <div class="card-header">
            <h1>
                <span>{{ this.action }}</span>
                Categoria
            </h1>
        </div>
        <div class="card-body">
            <!-- Create Category form -->
            <form class="mx-4" @submit.prevent="handleSubmit" ref="form">
                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input
                        type="text"
                        name="name"
                        autocomplete="off"
                        class="form-control"
                        v-model="form.name"
                    />
                </div>

                <div class="d-flex justify-content-between">
                    <a class="btn btn-primary" href="/categories">Volver</a>
                    <button class="btn btn-success">{{ this.action }} categoria</button>
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
        name: ''
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
                        await axios.post('/categories/create', this.form)
                        showToastNotification('Categoria creada!')
                        this.$refs.form.reset()
                    } else {
                        await axios.post(`/categories/${this.categoryInfo.id}`, this.form)
                        showToastNotification('Categoria editado!')
                    }
                } catch (error) {
                    this.errors = error.response.data.errors
                }
            }
        },
        mounted() {
            this.form = this.categoryInfo
        },
        props: {
            creating: {
                type: Boolean,
                default: true
            },
            categoryInfo: {
                type: Object,
                default: initialForm
            }
        }
    }
</script>
