<script>
import BaseForm from './BaseForm.vue'

export default {
    components: {
        BaseForm
    },
}

</script>

<template>
    <BaseForm name="vertical-form">
        <template v-for="(_, slot) of $slots" v-slot:[slot]="scope">
            <slot :name="slot" />
        </template>
    </BaseForm>
</template>

<style lang="sass" scoped>
.vertical-form-container
    max-height: 100%
    max-width: 100%

    display: flex
    justify-content: center
    align-items: center

    padding: 50px

    overflow: auto
    &:deep(.vertical-form)
        display: flex
        flex-direction: column
        gap: 7px
        min-width: 500px
        padding: 25px
        border-radius: 7px
        box-shadow: 2px 2px 8px 4px #eee
        .form-header
            text-align: center
            font-weight: 600
        .form-content
            display: flex
            flex-direction: column
            gap: 7px
        .form-buttons
            padding-top: 7px

</style>
