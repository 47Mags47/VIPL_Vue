<script>
export default {
    props: {
        button: {
            type: Boolean,
            default: false
        },
        width: {
            type: String,
            default: 'auto'
        }
    },
    computed: {
        getWidth() {
            return this.button && this.width == 'auto'
                ? 'width: 60px'
                : 'width:' + this.width
        }
    }
}
</script>

<template>
    <th :style="[getWidth]">
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
            border: $table-border
            &:first-child
                border-left: none
            &:last-child
                border-right: none
            .table-thead-cell-container
                width: 100%
                height: 100%
                padding: 15px 1rem
                text-align: left
                background: $table-thead-background
</style>
