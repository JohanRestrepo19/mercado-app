<template>
    <div class="card m-4 row p-4">
        <div class="row g-0">
            <div class="col-md-4">
                <img
                    :src="
                        itemImage.has_image
                            ? `/storage/images/${itemImage.name}`
                            : 'https://api.lorem.space/image/book?w=200'
                    "
                    class="img-fluid rounded-start mx-auto d-block"
                    alt="..."
                />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title">
                        <strong> {{ item.name }}</strong>
                    </h4>
                    <p class="card-text">
                        {{ item.short_description }}
                    </p>
                    <p class="card-text">
                        <small class="text-bold">
                            <strong>Precio</strong>: {{ item.price }} <strong>Cantidad</strong>:
                            {{ item.quantity }}
                        </small>
                    </p>
                    <p><strong>Total:</strong> {{ item.price * item.quantity }}</p>
                    <button class="btn btn-danger" @click="$emit('deleteItem', item.id)">
                        Remover del carrito
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        async created() {
            const {
                data: { image }
            } = await axios.get(`/cart/${this.item.id}`)
            this.itemImage = image
        },
        data() {
            return {
                itemImage: {
                    name: null,
                    has_image: false
                }
            }
        },
        emits: ['deleteItem'],
        props: {
            item: { type: Object }
        }
    }
</script>
