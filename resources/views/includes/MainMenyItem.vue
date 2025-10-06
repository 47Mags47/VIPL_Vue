<script>
import { hasPermission } from '@helpers';
import { Link } from '@inertiajs/vue3';
import { defineAsyncComponent } from 'vue';

export default {
    components: {
        Link,
        Ico: defineAsyncComponent(() => import('../components/icons/Ico.vue'))
    },
    props: {
        title: {
            type: String,
            required: true,
        },
        href: {
            type: String,
        },
        ico: {
            type: String,
            default: null
        },
        permission: {
            type: String,
            default: null
        },
        childs: {
            type: Array,
            default: null
        },

    },
    computed: {
        visible() {
            if (this.permission !== null)
                return hasPermission(this.permission)

            return true
        }
    }
}
</script>

<template>
    <div class="meny-item">
        <template v-if="childs !== null">
            <Ico :type="ico" />
            <div class="childs">
                <MainMenyItem v-for="item in childs" v-bind="{ ...item }" />
            </div>
        </template>
        <template v-else>
            <template v-if="ico !== null">
                <Link class="child" :href>
                <Ico :type="ico" />
                </Link>
            </template>
            <template v-else>
                <Link class="child" :href> {{ title }} </Link>
            </template>
        </template>
    </div>
</template>

<style lang="sass">
.meny-item
    position: relative
    width: 100%

    display: flex
    justify-content: center
    align-items: center
    cursor: pointer
    *
        color: $meny-color
    .ico
        width: 20px
        height: 20px

        padding: 5px

        border-radius: $default-border-radius
        border: 2px solid #00000000

        transition: .3s
    &:hover .ico
        border: 2px solid $meny-color

    .childs
        display: none
        position: absolute
        width: 300px
        top: 0
        left: 100%

        background: $meny-background
        border-radius: 0 15px 15px 0
        border-left: 2px solid white

        &>.meny-item
            justify-content: flex-start
            align-items: flex-start
            flex-direction: column
            gap: 3px
        .child
            width: 100%
            padding: 7px 15px
            color: $meny-color
            transition: .5s
            &:hover
                background: $meny-background-hover
    &:hover .childs
        display: block
</style>
