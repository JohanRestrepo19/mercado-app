<template>
    <!-- Erorres -->
    <errors-alert v-if="errors" :errors="errors" />

    <div class="card">
        <div class="card-header">
            <h1>
                <span>{{ this.action }}</span>
                Producto
            </h1>
        </div>
        <div class="card-body">
            <!-- Create product form -->
            <form class="mx-4" @submit.prevent="handleSubmit" ref="form">
                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" v-model="form.name" />
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="last_name" class="form-label">Descripción</label>
                    <textarea name="description" class="form-control" v-model="form.description"></textarea>
                    <!-- <input type="text" name="last_name" class="form-control" id="last_name" v-model="form.last_name" /> -->
                </div>

                <!-- Category Id -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">Categoria</label>
                    <!-- TODO: User el componente de v-select -->
                    <select name="category_id" class="form-select" v-model="form.category_id"></select>
                    <!-- <input type="number" name="number_id" class="form-control" v-model="form.number_id" /> -->
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label for="price" class="form-label">Precio</label>
                    <input type="number" min="0" name="price" class="form-control" v-model="form.price" />
                </div>

                <!-- Stock -->
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" min="1" class="form-control" id="stock" v-model="form.stock" />
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
    description: '',
    category_id: '',
    price: '',
    stock: ''
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
            console.log(this.form)
            /* this.errors = null */
            /* try { */
            /*     if (this.creating) { */
            /*         await axios.post('/users/create', this.form) */
            /*         showToastNotification('Usuario Creado!') */
            /*         this.$refs.form.reset() */
            /*     } else { */
            /*         await axios.post(`/users/${this.userInfo.id}`, this.form) */
            /*         showToastNotification('Usuario Editado!') */
            /*     } */
            /* } catch (error) { */
            /*     this.errors = error.response.data.errors */
            /* } */
        }
    },
    mounted() {
        this.form = this.userInfo
        console.log(this.form)
    },
    props: {
        creating: {
            type: Boolean,
            default: true
        },
        userInfo: {
            type: Object,
            default: initialForm
        }
    }
}
</script>
