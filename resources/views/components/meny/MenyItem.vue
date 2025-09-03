<script>
import { Link } from '@inertiajs/vue3';

export default {
    props: {
        title: {
            type: String,
            required: true,
        },
        Childs: {
            type: Array,
            default: null
        },
        list: {
            type: Boolean,
            default: false
        },
        href: {
            type: String,
        }
    },
    components: {
        Link,
    },
    slots: ['default', 'render']
}
</script>

<template>
    <template v-if="$slots.render == undefined">
        <li class="meny-item-container">
            <template v-if="list">
                <i class="fa-solid fa-chevron-left"></i>
                <span class="meny-item-content meny-item-title">{{ title }}</span>
                <ul class="meny-item-submeny-container">
                    <slot name="default" />
                </ul>
            </template>
            <template v-else>
                <Link :href class="meny-item-content">{{ title }}</Link>
            </template>
        </li>
    </template>
    <template v-if="$slots.render != undefined">
        <li class="meny-custom-item">
            <slot name="render" />
        </li>
    </template>
</template>

<style lang="sass">
@keyframes show
    0%
        display: none
        opacity: 0%
    1%
        display: flex
        opacity: 0%
    100%
        display: flex
        opacity: 100%
@keyframes close
    0%
        display: flex
        opacity: 100%
    100%
        display: none
        opacity: 0%

.meny-item-container
    position: relative

    display: flex
    align-items: center
    gap: 5px
    padding: 5px

    background: $meny-item-background
    border-radius: 5px

    transition: .5s

    cursor: pointer
    &:hover
        background: $meny-item-background-hover

    &:hover>.meny-item-submeny-container
        display: flex
        animation: show .5s ease
    svg
        color: $meny-item-color
        margin-left: 5px
    .meny-item-title
        display: block
        width: 100%
        height: 100%
    .meny-item-content
        display: block
        width: 100%
        height: 100%
        padding: 5px
        color: $meny-item-color
    .meny-item-submeny-container
        display: none
        flex-direction: column
        gap: 5px

        position: absolute
        top: -5px
        right: 100%

        width: auto
        min-width: 200px

        background: white
        border-radius: 3px
        box-shadow: $meny-submeny-container-box-shadow

        padding: 5px

        animation: close .5s ease
</style>
