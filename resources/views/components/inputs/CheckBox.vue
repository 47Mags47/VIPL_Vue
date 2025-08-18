<script>
import { default as BaseInput } from './BaseInput.vue';


export default {
    components: {
        BaseInput
    },
}
</script>

<template>
    <BaseInput type="checkbox" :item="{ position: 'vertical-reverse' }" />
</template>

<style lang="sass" scoped>
:deep(input[type="checkbox"])
    width: 17px
    height: 17px
</style>
