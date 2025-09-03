<script>
import BaseForm from './BaseForm.vue'

export default {
    components: {
        BaseForm
    },
}

</script>

<template>
    <BaseForm className="vertical-form">
        <template v-for="(_, slot) of $slots" v-slot:[slot]="scope">
            <slot :name="slot" />
        </template>
    </BaseForm>
</template>

<style lang="sass" scoped>
.vertical-form-container
    width: 100%
    height: 100%

    display: flex
    justify-content: center
    align-items: center

    overflow: auto

    padding: 25px
    &:deep(.vertical-form)
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

</style>
