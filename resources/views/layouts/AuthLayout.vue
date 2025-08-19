<script>
import BaseWebLayout from './BaseWebLayout.vue';
import Header from '../includes/Header.vue';

export default {
    components: {
        BaseWebLayout,
        Header,
    },
}

</script>

<template>
    <BaseWebLayout name="auth-layout">
        <Header />
        <slot />
    </BaseWebLayout>
</template>
