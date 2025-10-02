<script>
import { defineAsyncComponent } from 'vue';
import { router } from '@inertiajs/vue3';
import { clearObject } from '@helpers';

import BaseTable from './BaseTable.vue';
import TableRow from './components/TableRow.vue';
import TableTh from './components/TableTh.vue';
import TableTd from './components/TableTd.vue';
import { getObjectValue } from '@helpers';

export default {
    components: {
        BaseTable,
        TableRow,
        TableTh,
        TableTd,
        SearchInput: defineAsyncComponent(() => import('../inputs/SearchInput.vue')),
        BlueButton: defineAsyncComponent(() => import('../buttons/BlueButton.vue')),
        RedButton: defineAsyncComponent(() => import('../buttons/RedButton.vue')),
        Ico: defineAsyncComponent(() => import('../icons/Ico.vue')),
        BasePagination: defineAsyncComponent(() => import('../pagination/BasePagination.vue')),
    },
    props: {
        data: {
            type: Object,
            default: []
        },
        columns: {
            type: Array,
            default: []
        },
        href: {
            type: String,
            default: null
        },

        hasSearch: {
            type: Boolean,
            default: true
        },
        filters: {
            type: Array,
            default: []
        },

        hasAddButton: {
            type: Boolean,
            default: true
        },
        onAddButtonClick: {
            type: Function,
            default: null
        },

        hasDeleteButton: {
            type: [Function, Boolean],
            default: () => true
        },
        OnDeleteButtonClick: {
            type: Function,
            default: (row) => {
                let currentUrl = new URL(location.href)
                let deleteUrl = currentUrl.origin + currentUrl.pathname + '/' + row.id
                router.delete(deleteUrl)
            }
        },
        hasEditButton: {
            type: [Function, Boolean],
            default: () => true
        },
        OnEditButtonClick: {
            type: Function,
            default: (row) => {
                let currentUrl = new URL(location.href)
                let editUrl = currentUrl.origin + currentUrl.pathname + '/' + row.id + '/edit'
                router.get(editUrl)
            }
        },

        links: {
            type: Array,
            default: []
        }
    },
    computed: {
        localHref() {
            let url = new URL(location.href)

            return url.origin + url.pathname
        }
    },
    methods: {
        getData() {
            router.get(this.href, clearObject({ filters: this.filterData }))
        },
        AddButtonClickHandler() {
            this.onAddButtonClick !== null
                ? this.onAddButtonClick()
                : router.get(this.localHref + '/create')
        },
        searchinputHandler(value) {
            this.filterData.search = value

            clearTimeout(this.serchTimeout)
            this.serchTimeout = setTimeout(this.getData, 1000)

            this.searchAutoFocus = true
        },
        getObjectValue
    },
    data() {
        return {
            serchTimeout: null,
            filterData: {
                search: new URL(location.href).searchParams.get('filters[search]') ?? ''
            },
        }
    },
}

</script>

<template>
    <BaseTable class="resource-table" :header="$attrs.header">
        <template #before>
            <div class="table-option-container">
                <div class="filter-container">
                    <slot name="filters" />
                </div>
                <div class="search-container">
                    <template v-if="hasSearch">
                        <SearchInput name="filters[search]" placeholder="Найти..." :value="filterData.search"
                            :onInput="searchinputHandler" />
                    </template>
                </div>
                <div class="actions-container">
                    <slot name="actions" />

                    <BlueButton v-if="hasAddButton" class="add-button" :onClick="AddButtonClickHandler">
                        <Ico type="plus" />
                    </BlueButton>
                </div>
            </div>
        </template>

        <template #thead>
            <TableRow>
                <TableTh v-for="column in columns" v-bind="column">
                    {{ column.title }}
                </TableTh>

                <template v-if="data.data.length > 0">
                    <TableTh v-if="typeof hasDeleteButton == 'function' ? true : hasDeleteButton" button />
                    <TableTh v-if="typeof hasEditButton == 'function' ? true : hasEditButton" button />
                </template>

                <TableTh v-for="link in links" button />
            </TableRow>
        </template>

        <template #tbody>
            <TableRow v-for="row in data.data">
                <TableTd v-for="column in columns"
                    v-bind="{ ...column, value: getObjectValue(column.dataIndex, row) }" />

                <TableTd v-if="typeof hasDeleteButton == 'function' ? hasDeleteButton(row) : hasDeleteButton"
                    vertical="center" horizontal="center">
                    <RedButton :onClick="() => OnDeleteButtonClick(row)">
                        <Ico type="trash" />
                    </RedButton>
                </TableTd>

                <TableTd v-if="typeof hasEditButton == 'function' ? hasEditButton(row) : hasEditButton"
                    vertical="center" horizontal="center">
                    <BlueButton :onClick="() => OnEditButtonClick(row)">
                        <Ico type="pen" />
                    </BlueButton>
                </TableTd>

                <TableTd v-for="link in links" vertical="center" horizontal="center">
                    <BlueButton :onclick="() => link.onClick(row)">
                        <Ico :type="link.ico" />
                    </BlueButton>
                </TableTd>
            </TableRow>
        </template>

        <template #after>
            <BasePagination :current="data.meta.current_page" :last="data.meta.last_page" />
        </template>
    </BaseTable>
</template>

<style lang="sass">
.resource-table-container
    .before-table-container
        .table-option-container
            display: grid
            grid-template-areas: 'A A' 'B C'
            grid-template-rows: auto 30px
            grid-template-columns: 350px auto
            gap: 5px
            .filter-container
                grid-area: A
            .search-container
                grid-area: B
                input
                    width: 100%
            .actions-container
                grid-area: C

                width: auto

                display: flex
                justify-content: end
                gap: 5px
                .add-button
                    width: 40px

</style>
