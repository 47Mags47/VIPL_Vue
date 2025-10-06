<script>
import { DateTime } from 'luxon';

export default {
    inheritAttrs: false,
    props: {
        visible:{
            type: Boolean,
            default: true,
        },
        type: {
            type: String,
            default: 'string',
            validator(value) {
                return ['string', 'date'].includes(value)
            }
        },
        vertical: {
            type: String,
            default: 'top'
        },
        horizontal: {
            type: String,
            default: 'left'
        },
        colspan: {
            type: [Number, Function],
            default: null,
        },
        rowspan: {
            type: [Number, Function],
            default: null,
        },
        value: {
            type: String,
            default: ''
        }
    },
    computed: {
        styles() {
            let styles = {}

            let positions = {
                vertical: {
                    'top': 'flex-start',
                    'center': 'center',
                    'bottom': 'flex-end'
                },
                horizontal: {
                    'left': 'flex-start',
                    'center': 'center',
                    'right': 'flex-end'
                }
            }

            styles['align-items'] = positions.vertical[this.vertical]
            styles['justify-content'] = positions.horizontal[this.horizontal]

            return styles
        },
        normalizeValue() {
            if (this.type == 'string')
                return this.value
            if (this.type == 'date')
                return DateTime.fromISO(this.value).toFormat('dd.MM.yyyy')
        }
    }
}
</script>

<template>
    <td v-if="visible" :colspan :rowspan>
        <div class='table-cell-container' :style="styles">
            <template v-if="'default' in $slots">
                <slot />
            </template>
            <template v-else>{{ normalizeValue }}</template>
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
            font-size: .9rem
            &:first-child
                border-left: none
            &:last-child
                border-right: none
            .table-cell-container
                width: 100%
                height: 100%
                padding: 5px 10px
                display: flex
                // justify-content:
                // align-items: center
                // &.has-button:deep(.button)
                //     width: 35px
                //     height: 35px
                //     padding: 0
                //     font-size: .9rem
                // &.center
                //     padding: 5px
                //     display: flex
                //     justify-content: center
                //     align-items: center
                // &.empty
                //     padding: 50px 5px
                //     font-size: 2rem
                //     color: #999
                //     display: flex
                //     flex-direction: column
                //     gap: 10px

</style>
