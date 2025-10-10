<script>
import { PopUp } from '@components';
import { RedButton, Ico } from '@components';
import { hasPermission } from '@helpers';
import { Link, router } from '@inertiajs/vue3';
import MainMenyItem from './MainMenyItem.vue';
import { defineAsyncComponent } from 'vue';

export default {
    components: {
        RedButton,
        Ico,
        PopUp,
        Link,
        MainMenyItem: defineAsyncComponent(() => import('./MainMenyItem.vue'))
    },
    computed: {
        meny() {
            return [
                {
                    ico: 'list',
                    childs: [
                        {
                            title: 'Организации',
                            href: route('divisions.index'),
                            permission: 'division:viewAny',
                        },
                        {
                            title: 'Договора с банками',
                            href: route('bank-contracts.index'),
                            permission: 'bank_contract:viewAny',
                        },
                        {
                            title: 'Банки',
                            href: route('banks.index'),
                            permission: 'bank:viewAny',
                        },
                        {
                            title: 'Законы',
                            href: route('laws.index'),
                            permission: 'law:viewAny',
                        },
                        {
                            title: 'Выплаты',
                            href: route('payments.index'),
                            permission: 'payment:viewAny',
                        },
                    ]
                },
                {
                    ico: 'code',
                    childs: [
                        {
                            title: 'Писатели',
                            href: route('writers.index'),
                            permission: 'writer:viewAny'
                        },
                    ]
                },
                {
                    title: 'График выплат',
                    ico: 'calendar',
                    href: route('payment-events.index'),
                },
                {
                    title: 'Организация',
                    ico: 'building',
                    href: route('banks.index'),
                },
            ]
        }
    },
    methods: {
        logOut() {
            router.delete(route('session.destroy'))
        },
        hasPermission
    }
}
</script>

<template>
    <div class="main-meny-container">
        <div class="user">
            <Link :href="route('dashboard.index')">
            <Ico type="user" />
            </Link>
        </div>
        <div class="list">
            <MainMenyItem v-for="item in meny" v-bind="{ ...item }" />
        </div>
        <div class="options">
            <RedButton :onClick="logOut">
                <Ico type="right-from-bracket" />
            </RedButton>
        </div>
    </div>
</template>

<style lang="sass">
.main-meny-container
    color: $meny-color
    background: $meny-background

    display: flex
    flex-direction: column
    gap: 25px
    justify-content: space-between

    z-index: 999
    .user
        display: flex
        justify-content: center
        align-items: center

        padding: 10px 5px 0 5px
        a
            color: inherit
            .ico
                border-radius: 50%
                border: 2px solid white
                padding: 5px
                width: 20px
                height: 20px
                cursor: pointer
    .list
        flex: 1

        display: flex
        flex-direction: column

        gap: 10px
    .options
        display: flex
        flex-direction: column
        gap: 10px

        padding: 0 5px 10px 5px
</style>
