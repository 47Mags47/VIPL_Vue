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
        Link: defineAsyncComponent(() => import('../Link.vue')),
        Button: defineAsyncComponent(() => import('../Button.vue')),
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
            default: location.href
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
            default: true
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
            default: true
        },
        OnEditButtonClick: {
            type: Function,
            default: () => {}
        },

        links: {
            type: Array,
            default: []
        },

        hasPaginate: {
            type: Boolean,
            default: true,
        }
    },
    computed: {
        localHref() {
            let url = new URL(location.href)

            return url.origin + url.pathname
        },
    },
    methods: {
        getObjectValue,
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
        getCellBinds(row, column) {
            return {
                type: column.type ?? 'string',
                value: getObjectValue(column.dataIndex, row),
                rowspan: typeof column.rowspan === 'function'
                    ? column.rowspan(row)
                    : (column.rowspan ?? 1),
                colspan: typeof column.colspan === 'function'
                    ? column.colspan(row)
                    : (column.colspan ?? 1),
                visible: typeof column.visible === 'function'
                    ? column.visible(row)
                    : (column.visible ?? true),
            }
        }
    },
    data() {
        return {
            serchTimeout: null,
            filterData: {
                search: new URL(location.href).searchParams.get('filters[search]') ?? ''
            },
            rows: 'data' in this.data
                ? this.data.data
                : this.data,
            meta: 'meta' in this.data
                ? this.data.meta
                : null
        }
    },
    watch: {
        data(newData){
            this.rows = 'data' in newData
                ? newData.data
                : newData,
            this.meta = 'meta' in newData
                ? newData.meta
                : null
        }
    }
}

</script>

<template>
    <BaseTable class="resource-table" :header="$attrs.header">
        <template #before>
            <div class="table-option-container">
                <div class="table-filter-container">
                    <slot name="filters" />
                </div>
                <div class="table-search-container">
                    <template v-if="hasSearch">
                        <SearchInput name="filters[search]" placeholder="Найти..." :value="filterData.search"
                            :onInput="searchinputHandler" />
                    </template>
                </div>
                <div class="table-paginate-container">
                    <BasePagination v-if="hasPaginate && meta !== null" :current="meta.current_page" :last="meta.last_page" />
                </div>
                <div class="table-actions-container">
                    <slot name="actions" />
                    <Link v-if="hasAddButton"
                        class="add-button"
                        color="blue"
                        :href="`${localHref}/create`"
                        :onClick="AddButtonClickHandler"
                    >
                        <Ico type="plus" />
                    </Link>
                </div>
            </div>
        </template>

        <template #thead>
            <TableRow>
                <TableTh v-for="column in columns" v-bind="column">
                    {{ column.title }}
                </TableTh>

                <template v-if="rows.length > 0">
                    <TableTh v-if="typeof hasDeleteButton == 'function' ? true : hasDeleteButton" button />
                    <TableTh v-if="typeof hasEditButton == 'function' ? true : hasEditButton" button />
                </template>

                <TableTh v-for="link in links" button />
            </TableRow>
        </template>

        <template #tbody>
            <TableRow v-for="(row, rowIndex) in rows"
                :key="row.id ?? rowIndex"
            >
                <TableTd v-for="column in columns"
                    v-bind="getCellBinds(row, column)"
                />

                <TableTd v-if="typeof hasDeleteButton == 'function' ? hasDeleteButton(row) : hasDeleteButton"
                    vertical="center"
                    horizontal="center"
                >
                    <Button
                        color="red"
                        :onClick="() => OnDeleteButtonClick(row)"
                    >
                        <Ico type="trash" />
                    </Button>
                </TableTd>

                <TableTd v-if="typeof hasEditButton == 'function' ? hasEditButton(row) : hasEditButton"
                    vertical="center"
                    horizontal="center"
                >
                    <Link
                        color="blue"
                        :href="`${localHref}/${row.id}/edit`"
                        :onClick="() => OnEditButtonClick(row)"
                    >
                        <Ico type="pen" />
                    </Link>
                </TableTd>

                <TableTd v-for="link in links"
                    vertical="center"
                    horizontal="center"
                >
                    <Link
                        :href="typeof link.href === 'function' ? link.href(row) : link.href"
                        :color="'color' in link ? link.color : 'blue'"
                    >
                        <Ico :type="link.ico" />
                    </Link>

                </TableTd>
            </TableRow>
            <TableRow v-if="rows.length === 0">
                <TableTd :colspan="columns.length > 0 ? columns.length : 1" class="empty" horizontal="center" vertical="center">
                    <Ico type="database" />
                    <div class="shadow"></div>
                    <span class="text">Упс... Тут пусто</span>
                </TableTd>
            </TableRow>
        </template>

        <template #after>
            <BasePagination v-if="hasPaginate && meta !== null"
                :current="meta.current_page"
                :last="meta.last_page"
            />
        </template>
    </BaseTable>
</template>

<style lang="sass">
.resource-table-container
    .before-table-container
        .table-option-container
            display: grid
            grid-template-areas: 'A A A' 'B C D'
            grid-template-rows: auto 35px
            grid-template-columns: 350px auto
            gap: 5px
            .table-filter-container
                grid-area: A
            .table-search-container
                grid-area: B
                input
                    width: 100%
            .table-paginate-container
                grid-area: C

                width: auto
            .table-actions-container
                grid-area: D

                display: flex
                justify-content: end
                gap: 5px
                .add-button
                    width: 40px
    .table-container
        .resource-table tbody
            .empty .table-cell-container
                padding: 50px 0
                flex-direction: column
                gap: 7px
                color: #aaa
                .ico
                    position: relative
                    width: 50px
                    height: 50px
                .shadow
                    width: 70px
                    height: 15px

                    border-radius: 50%

                    background: #eee
                .text
                    padding-top: 10px
                    font-size: 1.2rem


</style>
