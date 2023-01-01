<template>
    <div class="container">
        <user-form :roles="roles" />
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
            roles: { type: Object, required: true }
        }
    }
</script>
