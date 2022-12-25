<template>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            <li v-for="(value, _, index) in errors" :key="index">
                <div v-for="(msg, index) in value" :key="index">
                    {{ msg }}
                </div>
            </li>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {
            console.log(this.errors)
        },
        props: ['errors']
    }
</script>
