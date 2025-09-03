<script>
import { usePage } from '@inertiajs/vue3';
import userLogo from '@src/user_logo.png'

export default {
    computed: {
        user: () => usePage().props.current_user?.data ?? {},
        userName() {
            let lastName = this.user?.last_name ?? ''
            let firstName = this.user?.first_name ?? ''
            let MiddleName = this.user?.middle_name ?? ''

            return lastName
            + ' '
            + (firstName !== '' ? (firstName[0] + '.') : '').toUpperCase()
            + ' '
            + (MiddleName !== '' ? (MiddleName[0] + '.') : '').toUpperCase()
            + ' '
        },
        userLogo() {
            return userLogo
        }
    },
}
</script>

<template>
    <div class="user-profile-container">
        <div class="user-logo">
            <img :src="userLogo" alt="img">
        </div>
        <div class="user-name">
            <span>{{ userName }}</span>
        </div>
    </div>
</template>

<style lang="sass" scoped>
.user-profile-container
    width: auto
    height: 100%

    display: flex
    align-items: center
    gap: 5px

    padding: 5px 10px

    border: 2px solid $header-color

    border-radius: $default-border-radius
    .user-logo
        width: 30px
        height: 30px
    .user-name
        white-space: nowrap
        font-weight: bold
</style>
