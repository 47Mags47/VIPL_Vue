<script>
import { Ico } from '../icons';
import { usePage } from '@inertiajs/vue3';


export default {
    components: {
        Ico,
    },
    data() {
        return {
            isOpen: true
        }
    },
    computed: {
        flash(){
            this.changeIsOpen()

            return usePage().props.flash
        }
    },
    methods: {
        changeIsOpen() {
            setTimeout(function () {
                this.isOpen = false
            }.bind(this), 5000)
        }
    },
    watch: {
        flash(){
            this.isOpen = true
        }
    }
}
</script>

<template>
    <div class="flash-messages-container" v-if="isOpen">
        <div class="flash-message-container" v-for="(messages, type) in flash" :key="type">
            <div :class="['flash-message', type]" v-for="(message, index) in messages" :key="`${index}-${Date.now()}`">
                <Ico v-if="type === 'success'" type="flash-success" />
                <Ico v-if="type === 'error'" type="flash-error" />
                <Ico v-if="type === 'warning'" type="flash-warning" />
                <span>{{ message }}</span>
            </div>
        </div>

    </div>
</template>

<style lang="sass" scoped>
.flash-messages-container
    position: absolute
    top: calc($header-height + 15px)
    right: 10px

    display: flex
    flex-direction: column
    align-items: center
    gap: 7px

    z-index: 999

    .flash-message-container
        @keyframes slide
            0%
                transform: translateX(calc(200%));
            15%
                transform: translateX(0);
            85%
                transform: translateX(0);
            100%
                transform: translateX(calc(200%));
                display: none

        .flash-message
            position: relative

            padding: 7px 10px
            border-radius: $default-border-radius

            display: flex
            justify-content: center
            gap: 7px

            box-shadow: 2px 3px 8px 1px #ccc

            background: white

            transform: translateX(200%)

            animation: slide 5s ease

            &.error svg
                color: red
            &.warning svg
                color: orange
            &.success svg
                color: green
</style>
