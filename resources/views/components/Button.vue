<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link
    },
    props: {
        href: {
            type: String
        },
        title: {
            type: String,
            default: null
        },
        color: {
            type: String,
            default: 'blue'
        },
        onClick:{
            type: Function,
        }
    },
    slots: [
        'default'
    ],
    computed: {
        classes() {
            let classes = { 'button': true }

            classes[this.color + '-button'] = true

            return classes
        }
    },
}
</script>

<template>
    <button :class="classes" @click="onClick">
        <template v-if="'default' in $slots">
            <slot name="default" />
        </template>
        <template v-else>
            {{ title }}
        </template>
    </button>
</template>

<style lang="sass">
.button
    display: block

    width: 100%
    height: 100%
    min-height: $input-height

    display: flex
    justify-content: center
    align-items: center

    border: none
    background: none

    padding: 5px 10px

    border-radius: $default-border-radius

    font-size: 1rem
    font-weight: 600
    color: $button-color

    cursor: pointer

    transition: .5s

    &.blue-button
        background: $blue-button-background
        &:hover
            background: $blue-button-backgroun-hover
            box-shadow: $blue-button-shadow
            color: $button-color

    &.red-button
        background: $red-button-background
        &:hover
            background: $red-button-backgroun-hover
            box-shadow: $red-button-shadow
            color: $button-color
</style>
