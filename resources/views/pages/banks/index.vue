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
        banks: () => usePage().props.banks
    },
    setup() {
        const columns = [
            {
                title: 'Код',
                dataIndex: 'code',
                width: '200px'
            },
            {
                title: 'Наименование',
                dataIndex: 'name'
            },
        ]

        return { columns }
    },
}
</script>

<template>
    <AuthLayout>
        <ResourceTable
            header="Банки"
            :href="route('banks.index')"
            :data="banks"
            :columns
        />
    </AuthLayout>
</template>
