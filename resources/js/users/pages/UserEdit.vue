<template>
    <div class="container py-4">
        <user-form :creating="false" :roles="roles" :userInfo="user" />
    </div>
</template>

<script>
    import UserForm from '../components/UserForm.vue'
    export default {
        components: { UserForm },
        data() {
            return {}
        },
        props: {
            roles: { type: Object, required: true },
            user: { type: Object, required: true }
        }
    }
</script>
