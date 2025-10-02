<script>
export default {
    props: {
        vertical: {
            type: String,
            default: 'top'
        },
        horizontal: {
            type: String,
            default: 'left'
        },
        gap: {
            type: [Array],
            default: [0, 0]
        }
    },
    data() {
        return {
            open: false
        }
    },
    computed: {
        styles() {
            let result = {}


            if (this.horizontal === 'right') {
                result['left'] = `calc(100% + ${this.gap[0]}px)`
                result['min-height'] = '100%'
            }

            if (this.vertical === 'top') {
                result['top'] = `calc(0px + ${this.gap[1]}px)`
            }

            return result
        }
    }
}
</script>

<template>
    <div class="popup-container">
        <div class="popup-body">
            <slot name="body" />
        </div>
        <div :class="{ 'popup-content': true, 'open': open }" :style="styles">
            <slot name="content" />
        </div>
    </div>
</template>

<style lang="sass">
.popup-container
    position: relative
    .popup-body
        position: relative
    .popup-content
        position: absolute

        padding: 5px

        border-radius: $default-border-radius
        box-shadow: 0 0 12px 4px #eee

        opacity: 0
        display: none

        transition: .5s
    &:hover .popup-content
        display: block
        opacity: 1

    // &[data-position="top-left"] .popup-content
    //     bottom: 100%
    //     right: 100%
    // &[data-position="top-center"] .popup-content
    //     bottom: 100%
    //     left: 100%
    //     transform: translateX(-50%)
    // &[data-position="top-right"] .popup-content
    //     bottom: 100%
    //     left: 100%

    // &[data-position="center-left"] .popup-content
    //     top: 100%
    //     transform: translateY(-50%)
    //     right: 100%
    // &[data-position="center-right"] .popup-content
    //     top: 0
    //     left: 100%
</style>
