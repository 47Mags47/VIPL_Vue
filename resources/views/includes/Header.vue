<script>
import MainMeny from './MainMeny.vue';
import UserProfile from './UserProfile.vue';

export default{
    components: {
        MainMeny,
        UserProfile
    }
}
</script>

<template>
    <header>
        <div class="logo-container">
            VIPL
        </div>
        <UserProfile />
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
