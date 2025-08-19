<script>
import BaseButton from './BaseButton.vue'

export default {
    components: {
        BaseButton
    }
}
</script>

<template>
    <BaseButton color="red" />
</template>

<style lang="sass" scoped>
.red-button
    background: $red-button-background
    &:hover
        background: $red-button-backgroun-hover
        box-shadow: $red-button-shadow
</style>
