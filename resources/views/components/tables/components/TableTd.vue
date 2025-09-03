<script>
export default {
    props: {
        button: {
            type: Boolean,
            default: false
        },
        center: {
            type: Boolean,
            default: false
        },
        empty: {
            type: Boolean,
            default: false
        },
        columnSpan: {
            type: Number,
            default: 1,
        }
    },
}
</script>

<template>
    <td :colspan="columnSpan">
        <div :class="{
            'table-cell-container': true,
            'has-button': button,
            'empty': empty,
            'center': (center || button || empty),
         }">
            <slot />
        </div>
    </td>
</template>

<style lang="sass" scoped>
table
    tbody tr
        &:last-child td
            border-bottom: none
        td
            border: $table-border
            &:first-child
                border-left: none
            &:last-child
                border-right: none
            .table-cell-container
                width: 100%
                height: 100%
                padding: 10px
                display: flex
                align-items: center
                &.has-button:deep(.button)
                    width: 35px
                    height: 35px
                    padding: 0
                    font-size: .9rem
                &.center
                    padding: 5px
                    display: flex
                    justify-content: center
                    align-items: center
                &.empty
                    padding: 50px 5px
                    font-size: 2rem
                    color: #999
                    display: flex
                    flex-direction: column
                    gap: 10px

</style>
