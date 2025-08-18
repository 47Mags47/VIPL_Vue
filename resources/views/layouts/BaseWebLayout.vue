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

<style></style>
