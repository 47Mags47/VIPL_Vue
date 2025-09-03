<script>
import { router, usePage } from '@inertiajs/vue3';
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
    computed: {
        current_user() { return usePage().props.current_user.data },
        permissions() { return this.current_user.permissions }
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
        },
        OtherClickListener(e) {
            let el = document.querySelector('.main-meny-container')
            let target = e.target

            if (el !== target && !el.contains(target)) {
                this.isOpen = false
            }
        }
    },
    setup() {
        return { router }
    },
    mounted() {
        document.addEventListener('click', this.OtherClickListener)
    },
    unmounted() {
        document.removeEventListener('click', this.OtherClickListener)
    }
}
</script>

<template>
    <div class="main-meny-container">
        <div class="ico" @click="togleIsOpen">
            <i class="fa-solid fa-bars"></i>
        </div>
        <ul :class="{ 'meny-list-container': true, 'open': isOpen }">
            <MenyItem title="Справочники" list v-if="current_user">
                <MenyItem title="Подразделения" v-if="permissions.includes('division:viewAny')"
                    :href="route('divisions.index')" />

                <MenyItem list title="Банки">
                    <MenyItem title="Писатели" v-if="permissions.includes('writer:viewAny')"
                        :href="route('writers.index')" />
                    <MenyItem title="Контракты с банками" v-if="permissions.includes('bank_contract:viewAny')"
                        :href="route('bank-contracts.index')" />
                    <MenyItem title="Банки" v-if="permissions.includes('bank:viewAny')" :href="route('banks.index')" />
                </MenyItem>

                <MenyItem list title="Выплаты">
                    <MenyItem title="Законы" v-if="permissions.includes('law:viewAny')" :href="route('laws.index')" />
                    <MenyItem title="выплаты" v-if="permissions.includes('payment:viewAny')"
                        :href="route('payments.index')" />
                </MenyItem>

            </MenyItem>
            <MenyItem title="Выход" v-if="current_user">
                <template v-slot:render>
                    <RedButton text="Выход" @Click="() => router.delete(route('session.destroy'))" />
                </template>
            </MenyItem>
        </ul>
    </div>
</template>

<style lang="sass" scoped>
@keyframes show
    0%
        display: none
        opacity: 0%
    1%
        display: flex
        opacity: 0%
    100%
        display: flex
        opacity: 100%
@keyframes close
    0%
        display: flex
        opacity: 100%
    100%
        display: none
        opacity: 0%

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
        flex-direction: column
        gap: 5px

        position: absolute
        right: 15px
        top: calc(100% + 10px)

        width: auto
        min-width: 200px

        padding: 5px

        background: $meny-container-background
        border-radius: 3px

        transition: .5s

        box-shadow: $meny-container-box-shadow
        animation: close .5s ease

        &.open
            display: flex
            animation: show .5s ease

</style>
