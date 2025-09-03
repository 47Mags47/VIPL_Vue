<script>
import { default as Ico } from '../icons/BaseIco.vue';
import { default as FormItem } from '../forms/FormItem.vue'


export default {
    components: {
        FormItem,
        Ico
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
            type: Object,
            default: null,
        },
        label: {
            type: String
        },
        disabled: {
            type: Boolean,
            default: false
        },
        item: {
            type: Object,
            default: {
                position: 'horizontal'
            }
        },
        options: {
            type: Array,
            required: true,
            default: []
        },
        valueIndex: {
            type: String,
            default: 'id'
        },
        titleIndex: {
            type: String,
            default: 'name'
        }
    },
    data() {
        return {
            selected: {},
            isOpen: false,
            listPosition: {}
        }
    },
    methods: {
        onItemClick(option) {
            this.isOpen = false
            this.selected = option;
        },
        onOpenClick() {
            this.isOpen = !this.isOpen

            const inputBounding = this.$refs.input.getBoundingClientRect()
            this.listPosition = {
                top: inputBounding.top + 35 + 'px',
                left: inputBounding.left + 'px',
                width: inputBounding.width + 'px'
            }
        },
        OtherClickListener(e) {
            let el = document.querySelector('.select-container')
            let target = e.target

            if (el !== target && !el.contains(target)) {
                this.isOpen = false
            }
        }
    },
    mounted() {
        const inputBounding = this.$refs.input.getBoundingClientRect()
        this.listPosition = {
            top: inputBounding.top + 35 + 'px',
            left: inputBounding.left + 'px',
            width: inputBounding.width + 'px'
        }

        if (this.value !== null)
            this.selected = this.value

        document.addEventListener('click', this.OtherClickListener)
    },
    unmounted() {
        document.removeEventListener('click', this.OtherClickListener)
    }
}
</script>

<template>
    <FormItem :name :label :type="item.position">
        <div class="select-container">
            <div :class="{ 'input': true, 'disabled': disabled }" @click="onOpenClick" ref="input">
                <input type="hidden" :name :id="name" :value="selected[valueIndex]" :placeholder="name" readonly />
                <span class="title">{{ selected[titleIndex] }}</span>
                <Ico type="array-down" />
            </div>
            <ul :class="{ 'select-options-container': true, 'open': isOpen }" :style="{
                top: listPosition.top,
                left: listPosition.left,
                width: listPosition.width,
            }">
                <li :class="{ 'select-option': true, 'selected': selected[valueIndex] === option[valueIndex] }"
                    v-for="option in options" @click="() => onItemClick(option)">{{
                        option[titleIndex] }}</li>
            </ul>
        </div>
    </FormItem>
</template>

<style lang="sass">

.select-container
    position: relative
    .input
        height: $input-height
        padding: $input-padding
        font-size: $input-font-size
        border-radius: $input-border-radius
        border: $input-border
        display: flex
        gap: 5px
        .title
            flex: 1
            overflow: hidden
            cursor: pointer
    .select-options-container
        position: fixed

        background: white
        box-shadow: 2px 2px 8px 4px #eeeeee00
        border-radius: 7px

        max-height: 0
        overflow-y: auto

        display: flex
        flex-direction: column

        transition: .3s

        z-index: 1
        @include scroll
        &.open
            max-height: $select-list-height
            box-shadow: 2px 2px 8px 4px #eee
        .select-option
            padding: 5px 10px
            transition: .5s

            cursor: pointer
            &:hover
                background: $option-background-hover
            &.selected
                font-weight: bold
                background: $option-background-selected

</style>
