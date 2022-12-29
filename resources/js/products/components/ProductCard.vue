<template>
    <!-- Product Card -->
    <div
        class="card my-4 styled-card"
        style="width: 15rem"
        @click="handleClickCard(this.product.id)"
    >
        <img
            :src="
                product.image
                    ? `/storage/images/${product.image}`
                    : 'https://api.lorem.space/image/book?w=200'
            "
            class="card-img-top"
            alt="..."
            height="340"
        />
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
        methods: {
            async handleClickCard(productId) {
                window.location = `/products/${productId}`
            }
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

<style lang="scss" scoped>
    .styled-card {
        transition: transform 0.5s;
    }

    .styled-card:hover {
        transform: scale(1.15);
        cursor: pointer;
    }
</style>
