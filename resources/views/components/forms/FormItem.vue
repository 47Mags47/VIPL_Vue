<script>
import FormError from './FormError.vue';

export default {
    props: {
        name: {
            type: String,
        },
        label: {
            type: String,
        },
        type: {
            type: String,
            default: 'horizontal',
            validator(value) {
                return ['horizontal', 'vertical', 'vertical-reverse'].includes(value)
            },
        },
    },
    components: {
        FormError
    },
    slots: [
        'default'
    ],
}
</script>

<template>
    <div :class="['form-item-container', `${type}-form-item`]">
        <FormError :name />
        <label :for="name">{{ label }}</label>
        <slot />
    </div>
</template>

<style lang="sass" scoped>
label
    padding-left: 7px
    color: #333
    font-weight: bold

.horizontal-form-item
    display: flex
    flex-direction: column
    gap: 5px

.vertical-reverse-form-item
    display: flex
    justify-content: flex-end
    align-items: center
    flex-direction: row-reverse
    height: $input-height
</style>
