<script>
import { defineAsyncComponent } from 'vue';

export default {
    components: {
        List: defineAsyncComponent(() => import('./List.vue')),
        Item: defineAsyncComponent(() => import('./Item.vue')),
        Ico: defineAsyncComponent(() => import('../icons/Ico.vue'))
    },
    props: {
        title: {
            type: String,
            required: true
        },
        ico: {
            type: String,
            default: null
        },
        childs: {
            type: Array,
            default: []
        },
        level: {
            type: Number,
            default: 0
        }
    },
    slots: [
        'itemRender'
    ],
    data() {
        return {
            open: false
        }
    },
    methods: {
        togleOpen() {
            this.open = !this.open
        }
    }
}
</script>

<template>
    <li :class="{ 'accordeon-list': true, 'open': open }">
        <div class="accordeon-list-header" @click="togleOpen" :style="{ 'padding-left': (level + 1) * 15 + 'px' }">
            <Ico v-if="!open" type="folder" />
            <Ico v-if="open" type="folder-open" />
            <span class="title">{{ title }}</span>
        </div>
        <div class="accordeon-list-childs" v-if="open">
            <ul v-for="item in childs">

                <List v-if="'childs' in item" v-bind="{ ...item, level: level + 1 }">
                    <template v-if="'itemRender' in $slots" #itemRender="props">
                        <slot name="itemRender" v-bind="{...props}" />
                    </template>
                </List>

                <Item v-else v-bind="item" :level="level + 1">
                    <template v-if="'itemRender' in $slots" #render="props">
                        <slot name="itemRender" v-bind="{...props}" />
                    </template>
                </Item>
            </ul>
        </div>
    </li>
</template>

<style lang="sass">
.accordeon-list
    display: flex
    flex-direction: column

    >.accordeon-list-header
        display: flex
        align-items: center
        gap: 5px

        padding: 7px 0

        background: $accordeon-list-backgound

        cursor: pointer
        &:hover
            background: $accordeon-list-backgound-hover
    >.accordeon-list-childs
        flex: 1
    &.open
        >.accordeon-list-header
            background: $accordeon-select-list-backgound
</style>
