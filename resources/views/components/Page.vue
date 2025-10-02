<script>
import { usePage } from '@inertiajs/vue3';
import { defineAsyncComponent } from 'vue';


export default {
    components: {
        GuestWebLayout: defineAsyncComponent(() => import('../layouts/GuestWebLayout.vue')),
        AuthLayout: defineAsyncComponent(() => import('../layouts/AuthLayout.vue')),
    },
    slots: [
        'default'
    ],
    computed: {
        bind() {
            return {
                auth: usePage().props.current_user !== undefined ? true : false
            }
        },
    }
}
</script>

<template>
    <GuestWebLayout v-if="!bind.auth">
        <slot name="default" />
    </GuestWebLayout>
    <AuthLayout v-if="bind.auth">
        <slot name="default" />
    </AuthLayout>
</template>
