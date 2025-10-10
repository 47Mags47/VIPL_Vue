<script>
import { router, usePage } from '@inertiajs/vue3';
import { AuthLayout } from '@layouts';
import { ResourceTable } from '@components';

export default {
    components: {
        AuthLayout,
        ResourceTable,
    },
    computed: {
        divisions: () => usePage().props.divisions
    },
    setup() {
        const columns = [
            {
                title: 'Наименование',
                dataIndex: 'name',
            },
        ]

        const links = [
            {
                ico: 'user',
                href: (row) => route('division.users.index', { division: row.id })
                // onClick: (row) => router.get(route('users.index', { division: row.id }))
            }
        ]

        return { columns, links }
    },
}
</script>

<template>
    <AuthLayout>
        <ResourceTable
            header="Организации"
            :href="route('divisions.index')"
            :data="divisions"
            :columns
            :links
        />
    </AuthLayout>
</template>
