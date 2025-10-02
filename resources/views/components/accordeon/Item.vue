<script>
import Ico from '../icons/Ico.vue';

export default {
    components: {
        Ico
    },
    props: {
        title: {
            type: String,
            required: true
        },
        ico: {
            type: String,
            default: null
        },
        level: {
            type: Number,
            default: 0
        }
    },
    slots: ['render']
}
</script>

<template>
    <li class="accordeon-item" :style="{ 'padding-left': (level + 1) * 15 + 'px' }">
        <slot v-if="'render' in $slots" name="render" v-bind="{...$attrs, ...$props}" />
        <template v-else>
            <Ico type="file" />
            <span class="title">{{ title }}</span>
        </template>
    </li>
</template>

<style lang="sass">
.accordeon-item
    display: flex
    align-items: center
    gap: 10px

    padding: 7px 0

    background: $accordeon-item-background
    color: $accordeon-color
</style>
