<script>
import { PopUp } from '@components';
import { RedButton, Ico } from '@components';
import { Link, router } from '@inertiajs/vue3';
import Item from './Item.vue';

export default {
    components: {
        RedButton,
        Ico,
        PopUp,
        Item,
        Link
    },
    computed: {
        meny() {
            return [
                {
                    title: 'Справочники',
                    ico: 'list',
                    childs: [
                        {
                            title: 'Подразделения',
                            link: route('divisions.index'),
                        },
                        {
                            title: 'Договора с банками',
                            link: route('bank-contracts.index'),
                        },
                        {
                            title: 'Банки',
                            link: route('banks.index'),
                        },
                        {
                            title: 'Законы',
                            link: route('laws.index'),
                        },
                        {
                            title: 'Выплаты',
                            link: route('payments.index'),
                        },
                        {
                            title: 'Писатели',
                            link: route('writers.index'),
                        },
                        {
                            title: 'График выплат',
                            link: route('payment-events.index'),
                        },
                    ]
                },
                {
                    title: 'Пользователи',
                    ico: 'users',
                    link: route('banks.index'),
                },
            ]
        }
    },
    methods: {
        logOut() {
            router.delete(route('session.destroy'))
        }
    }
}
</script>

<template>
    <div class="main-meny-container">
        <div class="user">
            <Ico type="user" />
        </div>
        <div class="list">
            <template v-for="item in meny">
                <div class="meny-item">
                    <template v-if="'childs' in item">
                        <Ico :type="item.ico" />

                        <div class="childs">
                            <Link v-for="child in item.childs" :href="child.link" class="child"> {{ child.title }} </Link>
                        </div>
                    </template>
                    <template v-else>
                        <Link :href="item.link"> <Ico :type="item.ico" /> </Link>
                    </template>
                </div>
            </template>
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
        .meny-item
            position: relative
            width: 100%

            display: flex
            justify-content: center
            align-items: center
            .ico
                width: 20px
                height: 20px

                padding: 5px

                border-radius: $default-border-radius
                border: 2px solid #00000000

                color: $meny-color

                transition: .3s
            &:hover .ico
               border: 2px solid white
            .childs
                position: absolute
                top: 0
                left: 100%
                width: 300px
                color: $meny-color
                background: $meny-background
                border-radius: 0 15px 15px 0

                border-left: 2px solid white

                display: none
                flex-direction: column
                gap: 3px

                overflow: hidden
                .child
                    padding: 7px 15px
                    color: $meny-color

                    transition: .5s
                    &:hover
                        background: $meny-background-hover
            &:hover .childs
                display: flex
        .popup-content
            width: 350px
            color: $meny-color
            background: $meny-background
            box-shadow: none
            border-radius: 0
    .options
        display: flex
        flex-direction: column
        gap: 10px

        padding: 0 5px 10px 5px
</style>
