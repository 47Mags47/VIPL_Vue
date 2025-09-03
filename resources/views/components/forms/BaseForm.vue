<script>
import { Form, router, usePage } from '@inertiajs/vue3'
import { BlueButton } from '../buttons'

export default {
    components: {
        Form,
        BlueButton
    },
    props: {
        className: {
            type: String,
        },
        header: {
            type: [String, null],
        },
        sbm: {
            type: String,
            default: 'Отправить'
        },
        action: {
            type: String,
            default: location.href
        },
        method: {
            type: String,
            default: 'post',
            validator(value) {
                return ['get', 'post', 'put', 'delete'].includes(value)
            }
        },
        onSubmit: {
            type: Function,
            default(e) {
                router.post(this.action, new FormData(e.target))
            }
        },
    },
    slots: [
        'buttons',
        'footer',
        'default'
    ],
    computed: {
        errors: () => usePage().props.errors,
        typeClass() {
            return this.className !== undefined ? this.className : ''
        },
        containerTypeClass() {
            return this.className !== undefined ? `${this.className}-container` : ''
        },
    },
}
</script>

<template>
    <div :class="['form-container', containerTypeClass]">
        <Form :action :method :class="['form', typeClass]">
            <div class="form-header" v-if="header !== undefined">
                <h3>{{ header }}</h3>
            </div>
            <div class="form-errors">
                <div class="form-error" v-if="'form' in errors">{{ errors.form }}</div>
            </div>
            <div class="form-content" v-if="$slots.default">
                <slot name="default" />
            </div>
            <div class="form-buttons">
                <slot name="buttons" />
                <BlueButton :text="sbm" />
            </div>
            <div class="form-footer" v-if="$slots.footer">
                <slot name="footer" />
            </div>
        </Form>
    </div>
</template>
