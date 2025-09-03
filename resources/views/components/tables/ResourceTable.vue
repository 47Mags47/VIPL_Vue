<script>
import { router } from '@inertiajs/vue3';
import { DateTime } from 'luxon';
import { getObjectValue } from '@helpers';
import { default as BaseTable } from './BaseTable.vue';
import { default as TableTh } from './components/TableTh.vue';
import { default as TableTd } from './components/TableTd.vue';
import { default as TableRow } from './components/TableRow.vue';
import { default as BlueButton } from '../buttons/BlueButton.vue';
import { default as RedButton } from '../buttons/RedButton.vue';
import { default as Ico } from '../icons/BaseIco.vue';
import { default as BasePagination } from '../pagination/BasePagination.vue';

export default {
    components: {
        BaseTable,
        TableRow,
        TableTh,
        TableTd,
        RedButton,
        BlueButton,
        Ico,
        BasePagination
    },
    props: {
        header: {
            type: String
        },
        data: {
            type: Object
        },
        href: {
            type: String
        },
        columns: {
            type: Array
        },
        hasAddButton: {
            type: [Boolean, Function],
            default: true
        },
        onAddClick: {
            type: Function,
            default: () => {
                let currentUrl = new URL(location.href)
                let deleteUrl = currentUrl.origin + currentUrl.pathname + '/create'
                router.get(deleteUrl)
            }
        },
        hasEditButton: {
            type: [Boolean, Function],
            default: true
        },
        onEditClick: {
            type: Function,
            default: (id) => {
                let currentUrl = new URL(location.href)
                let editUrl = currentUrl.origin + currentUrl.pathname + '/' + id + '/edit'
                router.get(editUrl)
            }
        },
        hasDeleteButton: {
            type: [Boolean, Function],
            default: true
        },
        onDeleteClick: {
            type: Function,
            default: (id) => {
                let currentUrl = new URL(location.href)
                let deleteUrl = currentUrl.origin + currentUrl.pathname + '/' + id
                router.delete(deleteUrl)
            }
        },
        links: {
            type: Array,
            default: []
        },
    },
    methods: {
        addClickHandler() {
            this.onAddClick()
        },
        deleteClickHandler(id) {
            this.onDeleteClick(id)
        },
        editClickHandler(id) {
            this.onEditClick(id)
        },
        getRowValue(index, row) {
            return getObjectValue(index, row)
        },
        formatRow(row, value) {
            if (row.type === 'date')
                return DateTime.fromISO(value).setLocale('ru').toLocaleString()

            return value
        }
    },

}
</script>

<template>
    <BaseTable :header="header" search :href>
        <template v-slot:actions>
            <BlueButton v-if="hasAddButton" @click="addClickHandler">
                <Ico type="add" />
            </BlueButton>
        </template>

        <template v-slot:thead>
            <TableRow rowKey="header">
                <TableTh v-for="column in columns" v-bind="column">{{ column.title }}</TableTh>
                <template v-if="data.data.length > 0">
                    <TableTh v-if="hasDeleteButton" button />
                    <TableTh v-if="hasEditButton" button />
                    <TableTh v-for="link in links" button />
                </template>
            </TableRow>
        </template>

        <template v-slot:tbody>
            <TableRow v-for="row in data.data" :rowKey="data.id">
                <TableTd v-for="column in columns">{{ formatRow(column, getRowValue(column.dataIndex, row)) }}</TableTd>

                <TableTd v-if="typeof (hasDeleteButton) == 'function' ? hasDeleteButton(row) : hasDeleteButton" button>
                    <RedButton @click="() => deleteClickHandler(row.id)">
                        <Ico type="trash" />
                    </RedButton>
                </TableTd>
                <TableTd v-if="typeof (hasEditButton) == 'function' ? hasEditButton(row) : hasEditButton" button>
                    <BlueButton @click="() => editClickHandler(row.id)">
                        <Ico type="edit" />
                    </BlueButton>
                </TableTd>

                <TableTd v-for="link in links" button>
                    <BlueButton @click="() => link.onClick(row)">
                        <Ico :type="link.ico" />
                    </BlueButton>
                </TableTd>
            </TableRow>

            <TableRow v-if="data.data.length === 0" rowKey="zero">
                <TableTd empty :columnSpan="columns.length">
                    <Ico type="cloud" />
                    <span>Упс... Данных нет</span>
                </TableTd>
            </TableRow>
        </template>

        <template v-slot:footer>
            <BasePagination :current="data.meta.current_page" :last="data.meta.last_page" />
        </template>
    </BaseTable>
</template>
