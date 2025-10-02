<script>
import { default as FormItem } from '../forms/FormItem.vue'


export default {
    components: {
        FormItem
    },
    props: {
        type: {
            type: String,
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
            type: [String, Number, Boolean],
            default: null
        },
        label: {
            type: String,
            default: null
        },
        placeholder: {
            type: String,
            default: ''
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
        },
        isFormItem: {
            type: Boolean,
            default: true
        },
        onChange: {
            type: Function,
            default: () => {}
        },
        onInput: {
            type: Function,
            default: () => {}
        }
    },
}
</script>

<template>
    <FormItem :name :label :type="item.position" v-if="label !== null">
        <input
            :type
            :id="id ?? name"
            :name
            :value
            :placeholder
            :disabled
            :autocomplete
            :readonly
            @change="(e) => onChange(e.target.value)"
            @input="(e) => onInput(e.target.value)"
        >
    </FormItem>

    <input
        v-else
        :type
        :id="id ?? name"
        :name
        :value
        :placeholder
        :disabled
        :autocomplete
        :readonly
        @change="(e) => onChange(e.target.value)"
        @input="(e) => onInput(e.target.value)"
    >
</template>

<style lang="sass" scoped>

input
    height: $input-height
    padding: $input-padding
    font-size: $input-font-size
    border-radius: $input-border-radius
    border: $input-border
</style>
