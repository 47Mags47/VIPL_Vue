<script>
import { default as FormItem } from '../forms/FormItem.vue'


export default {
    components: {
        FormItem
    },
    props: {
        type: {
            type: [String, null],
            default: 'text'
        },
        name: {
            type: String,
            required: true
        },
        id: {
            type: String,
        },
        value: {
            type: [String, Number, Boolean]
        },
        label: {
            type: String
        },
        placeholder: {
            type: String,
        },
        disabled: {
            type: Boolean,
            default: false
        },
        autocomplete: {
            type: String,
            default: 'off'
        },
        readonly: {
            type: Boolean,
            default: false
        },
        item: {
            type: Object,
            default: {
                position: 'horizontal'
            }
        }
    },
    computed: {
        currentValue: {
            get() {
                return this.value
            },
            set(value) {
                this.$emit('update:value', value)
            }
        },
    },
}
</script>

<template>
    <FormItem :name="name" :label="label" :type="item.position">
        <input :type :name :id="id ?? name" :placeholder="placeholder ?? name" :disabled :autocomplete :readonly
            v-model="currentValue">
    </FormItem>
</template>

<style lang="sass" scoped>

input
    height: $input-height
    padding: $input-padding
    font-size: $input-font-size
    border-radius: $input-border-radius
    border: $input-border
</style>
