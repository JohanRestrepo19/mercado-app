<template>
    <div class="container py-4">
        <div class="card mb-4">
            <h3 class="card-header">Carrito</h3>
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
        </div>
    </div>
</template>

<script>
    import CartItem from '../components/CartItem.vue'
    import { getUserCart, setUserCart } from '../../utils/localStorageHandler'

    export default {
        components: { CartItem },
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
                console.log('fui llamado desde: ', itemId)
                this.userCart = this.userCart.filter(item => item.id !== itemId)
                setUserCart(this.userAuthInfo.id, this.userCart)
            }
        },
        props: {
            userAuthInfo: {
                type: Object
            }
        }
    }
</script>
