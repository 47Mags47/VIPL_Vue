<script>
import { default as FormItem } from '../forms/FormItem.vue'


export default {
    components: {
        FormItem
    },
    props: {
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
            type: String
        },
        placeholder: {
            type: String,
        },
        disabled: {
            type: Boolean,
            default: false
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
}
</script>

<template>
    <FormItem :name :label :type="item.position">
        <textarea
            :id="id ?? name"
            :name
            :value
            :placeholder="placeholder ?? name"
            :disabled
            :readonly
        >
            {{ value }}
        </textarea>
    </FormItem>
</template>

<style lang="sass" scoped>

textarea
    height: $textarea-height
    padding: $input-padding
    font-size: $input-font-size
    border-radius: $input-border-radius
    border: $input-border

    resize: none
</style>
