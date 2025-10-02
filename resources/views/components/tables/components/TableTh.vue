<script>
export default {
    inheritAttrs: false,
    props: {
        button: {
            type: Boolean,
            default: false
        },

        width: {
            type: String,
            default: 'auto'
        },
    },
    computed: {
        bind(){
            return {
                width: this.button ? '60px' : this.width
            }
        }
    }
}
</script>

<template>
    <th v-bind="bind">
        <div :class="{ 'table-thead-cell-container': true, 'has-button': button }">
            <slot />
        </div>
    </th>
</template>

<style lang="sass" scoped>
table
    thead tr
        &:first-child th
            border-top: none
        th
            position: relative
            border: $table-border
            background: $table-thead-background
            &:first-child
                border-left: none
            &:last-child
                border-right: none
            .table-thead-cell-container
                width: 100%
                height: 100%
                padding: 15px 1rem
                text-align: left
</style>
