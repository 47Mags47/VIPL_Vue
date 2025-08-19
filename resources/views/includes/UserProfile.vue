<script>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import userLogo from '@src/user_logo.png'

export default {
    setup() {
        const user = computed(() => usePage().props.current_user.data)
        return { user }
    },
    computed: {
        userName() {
            let userName = this.user.first_name

            if (this.user.last_name !== null)
                userName = userName + ' ' + this.user.last_name[0].toUpperCase() + '.'

            if (this.user.middle_name !== null)
                userName = userName + ' ' + this.user.middle_name[0].toUpperCase() + '.'

            return userName
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

    border-radius: 7px
    .user-logo
        width: 30px
        height: 30px
    .user-name
        white-space: nowrap
        font-weight: bold
</style>
