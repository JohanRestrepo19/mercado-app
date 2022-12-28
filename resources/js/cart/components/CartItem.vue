<template>
    <div class="card mb-4" style="width: 540px">
        <div class="row g-0">
            <div class="col-md-4">
                <img
                    src="https://api.lorem.space/image/book?w=200"
                    class="img-fluid rounded-start"
                    alt="..."
                />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ item.name }}</h5>
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
    export default {
        data() {
            return {}
        },
        emits: ['deleteItem'],
        props: {
            item: { type: Object }
        }
    }
</script>
