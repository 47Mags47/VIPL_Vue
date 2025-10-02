<script>
import { defineAsyncComponent } from 'vue';

export default {
    components: {
        List: defineAsyncComponent(() => import('./List.vue')),
        Item: defineAsyncComponent(() => import('./Item.vue')),
        Ico: defineAsyncComponent(() => import('../icons/Ico.vue'))
    },
    props: {
        items: {
            type: Array,
            default: []
        },
        title: {
            type: String,
        },
    },
    slots: [
        'itemRender'
    ]
}
</script>

<template>
    <div class="accordeon-container">
        <ul v-for="item in items">
            <List v-if="'childs' in item" v-bind="{ ...item, level: 0 }">
                <template v-if="'itemRender' in $slots" #itemRender="props">
                    <slot name="itemRender" v-bind="{...props}" />
                </template>
            </List>

            <Item v-else v-bind="{ ...item, level: 0 }">
                <template #render="props">
                    <slot name="itemRender" v-bind="{...props}" />
                </template>
            </Item>
        </ul>
    </div>
</template>

<style lang="sass">
.accordeon-container
    background: $accordeon-item-background
    color: $accordeon-color
</style>
