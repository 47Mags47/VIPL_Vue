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
        bankContracts: () => usePage().props['bank-contracts']
    },
    setup() {
        const columns = [
            {
                title: 'Номер',
                dataIndex: 'number'
            },
            {
                title: 'Дата заключения',
                dataIndex: 'signed_at',
                type: 'date',
                width: '200px'
            },
            {
                title: 'Писатель',
                dataIndex: ['writer', 'name'],
                width: '350px'
            }
        ]

        return { columns }
    },
}
</script>

<template>
    <AuthLayout>
        <ResourceTable
            header="Контракты с банками"
            :href="route('bank-contracts.index')"
            :data="bankContracts"
            :columns
        />
    </AuthLayout>
</template>
