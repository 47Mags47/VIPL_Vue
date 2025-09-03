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
        writers: () => usePage().props.writers,
    },
    setup() {
        const columns = [
            {
                title: 'Тип',
                dataIndex: ['type', 'name'],
                width: '150px'
            },
            {
                title: 'Код',
                dataIndex: 'code',
                width: '200px'
            },
            {
                title: 'Класс',
                dataIndex: 'class',
                width: '400px'
            },
            {
                title: 'Наименование',
                dataIndex: 'name',
            },
        ]

        return { columns }
    },
}
</script>

<template>
    <AuthLayout>
        <ResourceTable
            header="Писатели"
            :href="route('writers.index')"
            :data="writers"
            :columns
        />
    </AuthLayout>
</template>
