<script>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import { MenyItem, RedButton } from '@components';

export default {
    components: {
        MenyItem,
        RedButton
    },
    data() {
        return {
            isOpen: false,
        }
    },
    setup() {
        const permissions = computed(() => usePage().props.current_user.data.permissions)
        return { permissions }
    },
    methods: {
        togleIsOpen() {
            this.isOpen = !this.isOpen
        },
        open() {
            this.isOpen = true
        },
        close() {
            this.isOpen = false
        }
    }
}
</script>

<template>
    <div class="main-meny-container">
        <div class="ico" @click="togleIsOpen">
            <i class="fa-solid fa-bars"></i>
        </div>
        <ul :class="{ 'meny-list-container': true, 'open': isOpen }">
            <MenyItem title="Справочники" list>
                <MenyItem title="Контракты с банками" v-if="permissions.includes('bank_contract-viewAny')" :href="route('bank-contracts.index')"/>
            </MenyItem>
            <MenyItem title="Выход">
                <template v-slot:render>
                    <RedButton text="Выход" />
                </template>
            </MenyItem>
        </ul>
    </div>
</template>

<style lang="sass" scoped>
.main-meny-container
    position: relative
    height: 100%
    .ico
        font-size: 25px
        height: 100%
        padding: 0 15px

        display: flex
        justify-content: center
        align-items: center

        cursor: pointer
    .meny-list-container
        display: none

        position: absolute
        right: 15px
        top: calc(100% + 10px)

        width: auto
        min-width: 200px

        padding: 5px

        background: white
        border-radius: 3px

        color: black

        transition: .5s

        box-shadow: 0px 0px 12px 4px #eee
        &.open
            display: block

</style>
