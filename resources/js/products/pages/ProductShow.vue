<template>
    <div class="container py-4">
        <div class="card text-center">
            <div class="card-header">{{ product.category.name }}</div>
            <div class="card-body">
                <h5 class="card-title text-bold">{{ product.name }}</h5>
                <p class="card-text text-muted">
                    {{ product.description }}
                </p>
                <div class="p-2">
                    <img
                        src="https://api.lorem.space/image/book?w=200"
                        class="border border-3 rounded p-2 styled-img"
                        alt="..."
                    />
                </div>
                <!-- Quantity -->
                <div>
                    <button class="btn btn-primary" @click="handleClickSub">-</button>
                    <strong class="btn" @click="handleClickReset">{{ quantity }}</strong>
                    <button class="btn btn-primary" @click="handleClickAdd">+</button>
                </div>
                <!-- <a href="#" class="btn btn-success mt-4">Añadir al carrito</a> -->
                <button class="btn btn-success mt-4" @click="handleClickAddToCart">
                    Añadir al carrito
                </button>
            </div>
            <div class="card-footer text-bold d-flex justify-content-evenly">
                <p><strong>Stock</strong>: {{ available }} Unidades</p>
                <p><strong>Precio/Unidad</strong>: ${{ product.price }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    import { addProductToCart } from '../../utils/localStorageHandler'
    export default {
        computed: {
            available() {
                return this.product.stock - this.quantity
            }
        },
        data() {
            return {
                quantity: 0
            }
        },
        methods: {
            handleClickAdd() {
                if (this.quantity < this.product.stock) this.quantity++
            },
            handleClickSub() {
                if (this.quantity > 0) this.quantity--
            },
            handleClickReset() {
                this.quantity = 0
            },
            handleClickAddToCart() {
                if (this.quantity === 0) return
                if (!this.authentication.authenticated) return (window.location = '/login')
                addProductToCart(
                    { ...this.product, quantity: this.quantity },
                    this.authentication.userId
                )
            }
        },
        mounted() {
            console.log(this.authentication)
        },
        props: ['product', 'authentication']
    }
</script>

<style lang="scss" scoped>
    .styled-img {
        transition: transform 0.5s;
    }

    .styled-img:hover {
        transform: scale(1.1);
    }
</style>
