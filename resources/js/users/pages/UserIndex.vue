<template>
    <div>
        <h1>Hola, yo soy el componente de UserIndex</h1>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        props: ['users'],
        mounted() {
            console.log(this.users)
        }
    }
</script>
