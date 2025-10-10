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
    },
    slots: [
        'default'
    ],
    computed: {
        classes() {
            let classes = {'link': true}

            classes[this.color + '-link'] = true

            return classes
        }
    },
}
</script>

<template>
    <a :href :class="classes">
        <template v-if="'default' in $slots">
            <slot name="default" />
        </template>
        <template v-else>
            {{ title }}
        </template>
    </a>
</template>

<style lang="sass">
.link
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

    &.blue-link
        background: $blue-button-background
        &:hover
            background: $blue-button-backgroun-hover
            box-shadow: $blue-button-shadow
            color: $button-color

    &.red-link
        background: $red-button-background
        &:hover
            background: $red-button-backgroun-hover
            box-shadow: $red-button-shadow
            color: $button-color
</style>
