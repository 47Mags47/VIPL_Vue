<script>
export default {
    props: {
        type: {
            type: String,
            default: 'button',
            validator(value) {
                return ['button'].includes(value)
            }
        },
        color: {
            type: String,
            default: 'default'
        },
        text: {
            type: String
        },
        onClick: {
            type: Function
        }
    },
    slots: [
        'default',
    ]
}
</script>

<template>
    <button :class="['button', `${color}-button`]" @click="onClick">
        <slot />
    </button>
</template>

<style lang="sass" scoped>
.button
    width: 100%
    height: 100%
    min-height: $input-height

    border: none
    background: none

    padding: 5px 10px

    border-radius: $default-border-radius

    font-size: 1rem
    font-weight: 600
    color: $button-color

    cursor: pointer

    transition: .5s
</style>
