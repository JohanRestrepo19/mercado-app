<template>
    <div class="container py-4">
        <user-form :creating="false" :userInfo="user" />
    </div>
</template>

<script>
    import UserForm from '../components/UserForm.vue'
    export default {
        components: { UserForm },
        data() {
            return {}
        },
        props: ['user']
    }
</script>
