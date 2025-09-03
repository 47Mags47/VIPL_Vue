<script>
import { router, usePage } from '@inertiajs/vue3';
import { default as SearchInput } from '../inputs/SearchInput.vue'
import { default as BlueButton } from '../buttons/BlueButton.vue'
import { default as Ico } from '../icons/BaseIco.vue'
import { getObjectValue } from '@helpers';


export default {
    props: {
        header: {
            type: String
        },
        search: {
            type: Boolean,
            default: false,
        },
        href: {
            type: String,
            default: location.href
        }
    },
    slots: [
        'filters',
        'thead',
        'tbody',
        'pagination',
    ],
    components: {
        SearchInput,
        BlueButton,
        Ico
    },
    data() {
        return {
            filterValues: {},
            searchTimer: setTimeout(() => {}, 0),
        }
    },
    methods: {
        filterInputChangeHandler(name, val) { this.filterValues[name] = val },
        sendFilters() {
            clearTimeout(this.searchTimer )

            for (let key in this.filterValues) {
                if(getObjectValue(key, this.filterValues) == '')
                    delete this.filterValues[key]
            }

            router.get(this.href, { filters: this.filterValues })
        },
        onSearchInputHandler(val){
            clearTimeout(this.searchTimer)
            this.searchTimer = setTimeout(this.sendFilters, 700);

            this.filterInputChangeHandler('search', val)
        }
    },
    mounted() {
        this.filterValues = usePage().props.filters ?? {}
    },
}
</script>

<template>
    <div class="table-container">
        <div class="table-container-header">
            <div class="table-caption" v-if="header">
                <h3>{{ header }}</h3>
            </div>
            <div class="table-options">
                <div class="filter-container">

                </div>
                <div class="search-container">
                    <template v-if="search">
                        <SearchInput name="filter[search]" placeholder="Найти..." :value="filterValues.search"
                            :onInput="(val) => onSearchInputHandler(val)"
                        />
                        <BlueButton @Click="sendFilters">
                            <Ico type="search" />
                        </BlueButton>
                    </template>
                </div>
                <div class="actions-container">
                    <slot name="actions" />
                </div>
            </div>
        </div>
        <div class="table-container-body">
            <table>
                <thead>
                    <slot name="thead" />
                </thead>
                <tbody>
                    <slot name="tbody" />
                </tbody>
            </table>
        </div>
        <div class="table-container-footer">
            <slot name="footer" />
        </div>
    </div>
</template>

<style lang="sass">
.table-container
    display: flex
    flex-direction: column
    gap: 10px
    padding: 15px

    overflow: auto

    @include scroll
    .table-container-header
        .table-caption
            text-align: center
        .table-options
            display: grid
            grid-template-areas: 'A A' 'B C'
            grid-template-columns: 350px auto
        .filter-container
            grid-area: A
        .search-container
            grid-area: B

            display: flex
            align-items: center
            gap: 5px
            .form-item-container
                flex: 1
                label
                    display: none
            .blue-button
                width: 35px
                height: 30px
                font-size: .9rem
        .actions-container
            grid-area: C

            display: flex
            justify-content: flex-end
            gap: 5px

            .button
                width: 35px
                font-size: .9rem
    .table-container-body
        border: $table-border
        border-radius: $default-border-radius
        table
            width: 100%
            height: 100%

            border-collapse: collapse

            overflow: hidden
</style>
