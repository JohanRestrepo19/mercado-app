<template>
    <!-- Product Card -->
    <div class="card my-4" style="width: 15rem">
        <img src="https://api.lorem.space/image/book?w=200" class="card-img-top" alt="..." />
        <div class="card-body">
            <h5 class="card-title fw-bold">{{ product.name }}</h5>
            <p class="card-text">
                {{ shortDesc ? product.short_description : product.description }}
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        props: {
            product: Object,
            shortDesc: {
                type: Boolean,
                default: false
            }
        }
    }
</script>
