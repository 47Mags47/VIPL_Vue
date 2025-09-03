<script>
import { FlashMessages } from '@components';

export default {
    props: ['name'],
    components: {
        FlashMessages
    }
}
</script>

<template>
    <FlashMessages />
    <div :class="['layout', name]">
        <slot />
    </div>
</template>

<style lang="sass" scoped>
.layout
    width: 100%
    height: 100%
</style>
