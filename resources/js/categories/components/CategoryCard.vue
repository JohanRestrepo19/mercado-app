<template>
    <div class="card mb-4">
        <h2 class="card-header">{{ category.name }}</h2>
        <div class="d-flex flex-wrap justify-content-evenly mb-4">
            <!-- Product Card -->
            <div
                class="card my-4"
                style="width: 15rem"
                v-for="product in category.products"
                :key="product.id"
            >
                <img
                    src="https://api.lorem.space/image/book?w=200"
                    class="card-img-top"
                    alt="..."
                />
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ product.name }}</h5>
                    <p class="card-text">
                        {{ product.description }}
                    </p>
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
        props: ['category']
    }
</script>
