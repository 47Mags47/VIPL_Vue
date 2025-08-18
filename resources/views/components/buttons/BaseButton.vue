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
        }
    }
}
</script>

<template>
    <button :class="['button', `${color}-button`]">{{ text }}</button>
</template>

<style lang="sass" scoped>
.button
    width: 100%
    height: 100%
    min-height: $input-height

    border: none
    background: none

    padding: 5px 10px

    border-radius: 7px

    font-size: 1rem
    font-weight: 600
    color: $button-color

    cursor: pointer

    transition: .3s
    &:hover
        background: $blue-button-backgroun-hover
        box-shadow: $blue-button-shadow
</style>
