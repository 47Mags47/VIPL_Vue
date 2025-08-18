<script>
import BaseButton from './BaseButton.vue'


export default {
    components: {
        BaseButton
    }
}
</script>

<template>
    <BaseButton color="blue" />
</template>

<style lang="sass" scoped>
.blue-button
    background: $blue-button-background
</style>
