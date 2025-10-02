<script>
import { usePage } from '@inertiajs/vue3';
import { AuthLayout } from '@layouts';
import { ResourceTable } from '@components';

export default {
    components: {
        AuthLayout,
        ResourceTable,
    },
    computed: {
        paymentEvents: () => usePage().props['payment-events']
    },
    setup() {
        const columns = [
            {
                title: 'Дата',
                dataIndex: 'date',
                type: 'date',
                width: '150px',
                setParams: (row) => {
                    let thisDates = usePage().props['payment-events'].data.filter((dataRow) => dataRow.date === row.date)
                    let isFirst = thisDates[0].id === row.id

                    return {
                        rowspan: isFirst ? thisDates.length : 1,
                        visible: isFirst
                    }

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
}
</script>

<template>
    <AuthLayout>
        <ResourceTable
            header="График выплат"
            :data="paymentEvents"
            :columns
        />
        <!-- :href="route('payment-events.index')" -->
        <!-- :data="paymentEvents" -->
        <!-- :columns -->
        <!-- :hasPaginate="false" -->
    </AuthLayout>
</template>
