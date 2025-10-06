<script>
import { usePage } from '@inertiajs/vue3';
import BaseWebLayout from './BaseWebLayout.vue';
import MainMeny from '../includes/MainMeny.vue';

export default {
    components: {
        BaseWebLayout,
        MainMeny,
    },
    computed: {
        current_user() { return usePage().props.current_user.data },
        permissions() { return this.current_user.permissions },
    },
}

</script>

<template>
    <BaseWebLayout name="auth-layout">
        <MainMeny />
        <div class="content">
            <slot />
        </div>
    </BaseWebLayout>
</template>

<style lang="sass">
.auth-layout
    display: grid
    grid-auto-flow: column
    grid-template-columns: $meny-width
    .content
        padding: 10px 5px
        overflow: auto
        scrollbar-gutter: stable
        @include scroll()
</style>
