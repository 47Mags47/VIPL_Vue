<script>
import { usePage } from '@inertiajs/vue3';
import MainMeny from './MainMeny.vue';
import UserProfile from './UserProfile.vue';

export default{
    components: {
        MainMeny,
        UserProfile
    },
    computed: {
        current_user: () => usePage().props.current_user
    }
}
</script>

<template>
    <header>
        <div class="logo-container">
            VIPL
        </div>
        <UserProfile v-if="current_user" />
        <MainMeny />
    </header>
</template>

<style lang="sass" scoped>
header
    width: 100%
    height: $header-height

    display: flex
    justify-content: space-between
    align-items: center

    background: $header-background

    color: $header-color

    padding: 5px 0px 5px 50px
    .logo-container
        width: 100%

        font-size: 1.5rem
        font-weight: bold
</style>
