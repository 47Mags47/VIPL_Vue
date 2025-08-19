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
                <Link href="" class="meny-item-content">{{ title }}</Link>
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
.meny-item-container
    position: relative

    display: flex
    align-items: center
    gap: 5px

    border-radius: 3px

    transition: .5s

    cursor: pointer
    &:hover
        background: #eee
    &:hover .meny-item-submeny-container
        display: block
    svg
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
    .meny-item-submeny-container
        display: none

        position: absolute
        top: -5px
        right: 100%

        width: auto
        min-width: 200px

        background: white
        border-radius: 3px
        box-shadow: -12px 0px 12px 4px #eee

        padding: 5px
</style>
