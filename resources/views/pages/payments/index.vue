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
        payments: () => usePage().props.payments
    },
    setup() {
        const columns = [
            {
                title: 'Код',
                dataIndex: 'code',
                width: '100px',
            },
            {
                title: 'Наименование',
                dataIndex: 'name',
            },
            {
                title: 'КБК',
                dataIndex: 'kbk',
                width: '200px',
            },
            {
                title: 'Закон',
                dataIndex: ['law', 'code'],
                width: '200px',
            },
        ]

        return { columns }
    },
}
</script>

<template>
    <AuthLayout>
        <ResourceTable
            header="Законы"
            :href="route('payments.index')"
            :data="payments"
            :columns
        />
    </AuthLayout>
</template>
