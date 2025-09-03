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
        laws: () => usePage().props.laws
    },
    setup() {
        const columns = [
            {
                title: 'Код',
                dataIndex: 'code',
                width: '100px'
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
            header="Законы"
            :href="route('laws.index')"
            :data="laws"
            :columns
        />
    </AuthLayout>
</template>
