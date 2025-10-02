<script>
import { defineAsyncComponent } from 'vue';
import { usePage } from '@inertiajs/vue3';
import BaseForm from './BaseForm.vue'


export default {
    components: {
        BaseForm,
        BlueButton: defineAsyncComponent(() => import('../buttons/BlueButton.vue'))
    },
    slots: [
        'default',
        'footer'
    ],
    props: {
        header: {
            type: String,
            default: null
        },
        sbm: {
            type: [String, Boolean],
            default: 'Отправить'
        },
    },
    computed: {
        errors() {
            return usePage().props.errors
        },
        bind() {
            return {
                container: {
                    class: 'vertical-form',
                },
                header: {
                    visible: this.header !== null,
                    text: this.header,
                },
                errors: {
                    visible: 'form' in this.errors,
                    message: this.errors.form
                },
                buttons: {
                    submit: {
                        visible: this.sbm !== false,
                        text: this.sbm,
                    }
                },
            }
        }
    }
}

</script>

<template>
    <BaseForm :class="bind.container.class">
        <div v-if="bind.header.visible" class="form-header">
            <h3>{{ bind.header.text }}</h3>
        </div>
        <div class="form-errors">
            <div class="form-error" v-if="bind.errors.visible">{{ bind.errors.message }}</div>
        </div>
        <div class="form-content" v-if="$slots.default">
            <slot name="default" />
        </div>
        <div class="form-buttons">
            <slot name="buttons" />
            <BlueButton v-if="bind.buttons.submit.visible" :text="bind.buttons.submit.text" />
        </div>
        <div class="form-footer" v-if="$slots.footer">
            <slot name="footer" />
        </div>
    </BaseForm>
</template>

<style lang="sass">
.vertical-form-container
    display: flex
    justify-content: center
    align-items: center
    overflow: auto
    padding: 25px
    .vertical-form
        flex: 0 1 auto
        max-width: 100%
        max-height: 100%
        min-width: 500px

        display: flex
        flex-direction: column
        gap: 15px

        padding: 25px
        border-radius: $default-border-radius

        box-shadow: 2px 2px 8px 4px #eee

        overflow: auto
        .form-header
            text-align: center
            font-weight: 600
        .form-errors .form-error
            width: 100%
            max-width: 450px
            background: $form-error-background
            border: $form-error-border
            padding: 5px 7px
            border-radius: $default-border-radius
            font-size: .9rem
            color: $form-error-color
        .form-content
            display: flex
            flex-direction: column
            gap: 7px
        .form-buttons
            padding-top: 7px
//
</style>
