<script>
import { router } from '@inertiajs/vue3'
import { BlueButton } from '../buttons'


export default {
    components: {
        BlueButton
    },
    props: {
        name: {
            type: String,
        },
        header: {
            type: [String, null],
        },
        smb: {
            type: String,
            default: 'Отправить'
        },
        onSubmit: {
            type: Function,
            default(e) {
                router.post(location.href, new FormData(e.target))
            }
        },
    },
    slots: [
        'buttons',
        'footer',
        'default'
    ],
    methods: {
        handleSubmit(e) {
            e.preventDefault()
            this.onSubmit(e)
        }
    },
    computed: {
        typeClass() {
            return this.name !== undefined ? this.name : ''
        },
        containerTypeClass() {
            return this.name !== undefined ? `${this.name}-container` : ''
        }
    }
}
</script>

<template>
    <div :class="['form-container', containerTypeClass]">
        <form :class="['form', typeClass]" @submit="handleSubmit">
            <div class="form-header" v-if="header !== undefined">
                <h3>{{ header }}</h3>
            </div>
            <div class="form-content" v-if="$slots.default">
                <slot name="default" />
            </div>
            <div class="form-buttons">
                <slot name="buttons" />
                <BlueButton :text="smb" />
            </div>
            <div class="form-footer" v-if="$slots.footer">
                <slot name="footer" />
            </div>
        </form>
    </div>
</template>

<style lang="sass" scoped>
.form-container
    width: 100%
    height: 100%
</style>
