<template>
    <div class="container py-4">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <h3>Carrito</h3>
                <button class="btn btn-primary" @click="handleGoBack">Volver</button>
            </div>
            <h3
                class="card-body d-flex flex-column align-items-center"
                v-if="!userCart || userCart.length === 0"
            >
                No tienes productos en el carrito
            </h3>
            <div class="card-body d-flex flex-column align-items-center" v-else>
                <cart-item
                    v-for="item in userCart"
                    :key="item.id"
                    :item="item"
                    @delete-item="handleDeleteItem"
                />
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <strong>Total: </strong>
                <span class="text-muted">{{ cartTotal }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    import CartItem from '../components/CartItem.vue'
    import { getUserCart, setUserCart } from '../../utils/localStorageHandler'

    export default {
        components: { CartItem },
        computed: {
            cartTotal() {
                return this.userCart.reduce((acc, { quantity, price }) => {
                    return (acc += quantity * price)
                }, 0)
            }
        },
        created() {
            this.userCart = getUserCart(this.userAuthInfo.id)
        },
        data() {
            return {
                userCart: []
            }
        },
        methods: {
            handleDeleteItem(itemId) {
                this.userCart = this.userCart.filter(item => item.id !== itemId)
                setUserCart(this.userAuthInfo.id, this.userCart)
            },
            handleGoBack() {
                window.history.back(1)
            }
        },
        props: {
            userAuthInfo: {
                type: Object
            }
        }
    }
</script>
