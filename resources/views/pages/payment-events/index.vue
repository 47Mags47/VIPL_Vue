<script>
import { router, usePage } from '@inertiajs/vue3';
import { AuthLayout } from '@layouts';
import { ResourceTable, BlueButton, Ico } from '@components';
import { DateTime } from 'luxon';

export default {
    components: {
        AuthLayout,
        ResourceTable,
        BlueButton,
        Ico
    },
    computed: {
        paymentEvents: () => usePage().props['payment-events'],
        currentMonth: () => DateTime.fromISO(usePage().props.month).setLocale('ru')
    },
    setup() {
        const columns = [
            {
                title: 'Дата',
                dataIndex: 'date',
                type: 'date',
                width: '150px',
                rowspan: (row) => {
                    let thisDates = usePage().props['payment-events'].data.filter((dataRow) => dataRow.date === row.date)
                    let isFirst = thisDates[0].id === row.id

                    return isFirst ? thisDates.length : 1
                },
                visible: (row) => {
                    let thisDates = usePage().props['payment-events'].data.filter((dataRow) => dataRow.date === row.date)
                    let isFirst = thisDates[0].id === row.id

                    return isFirst
                }
            },
            {
                title: 'Код выплаты',
                dataIndex: ['payment', 'code'],
                width: '150px'
            },
            {
                title: 'Наименование выплаты',
                dataIndex: ['payment', 'name'],
            },
            {
                title: 'Статус',
                dataIndex: ['status', 'name'],
                width: '150px'
            },
        ]

        const filters = [
            {
                label: 'Дата',
                type: 'datePicker',
                level: 'month',
                value: usePage().props.month,
            }
        ]

        return { columns, filters }
    },
    methods: {
        previosMonthClickHandler() {
            let url = new URL(location.href)
            let previosMonth = this.currentMonth.minus({ month: 1 })

            url.searchParams.set('month', previosMonth.month)
            url.searchParams.set('year', previosMonth.year)

            router.get(url)
        },
        currentMonthClickHandler() {
            let url = new URL(location.href)

            if (url.searchParams.get('month') !== undefined)
                url.searchParams.delete('month')
            if (url.searchParams.get('year') !== undefined)
                url.searchParams.delete('year')

            router.get(url)
        },
        nextMonthClickHandler() {
            let url = new URL(location.href)
            let nextMonth = this.currentMonth.plus({ month: 1 })

            url.searchParams.set('month', nextMonth.month)
            url.searchParams.set('year', nextMonth.year)

            router.get(url)
        }
    }
}
</script>

<template>
    <AuthLayout>
        <ResourceTable header="График выплат" :data="paymentEvents" :columns :hasPaginate="false">
            <template #actions>
                <div class="month-clicker">
                    <BlueButton :onclick="previosMonthClickHandler"><Ico type="chevron-left" /></BlueButton>
                    <BlueButton :onclick="currentMonthClickHandler" class="current-month-button">{{ currentMonth.toFormat('LLLL') }}</BlueButton>
                    <BlueButton :onclick="nextMonthClickHandler"><Ico type="chevron-right" /></BlueButton>
                </div>
            </template>
        </ResourceTable>
    </AuthLayout>
</template>

<style lang="sass">
.month-clicker
    display: flex
    gap: 5px
    .current-month-button
        min-width: 100px
</style>
