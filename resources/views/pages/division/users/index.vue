<script>
import { Page, ResourceTable } from '@components';
import { usePage } from '@inertiajs/vue3';

export default {
    components: {
        Page,
        ResourceTable
    },
    computed: {
        division: () => usePage().props.division.data,
        users: () => usePage().props.users,
    },
    setup() {
        let columns = [
            {
                title: 'Статус',
                dataIndex: ['status', 'name'],
                width: '200px'
            },
            {
                title: 'Роль',
                dataIndex: ['role', 'name'],
                width: '200px'
            },
            {
                title: 'Фамилия',
                dataIndex: 'last_name',
            },
            {
                title: 'Имя',
                dataIndex: 'first_name',
            },
            {
                title: 'Отчество',
                dataIndex: 'middle_name',
            },
            {
                title: 'Почта',
                dataIndex: 'email',
            },
        ]

        return { columns }
    }
}
</script>

<template>
    <Page>
        <ResourceTable
            :header="`Сотрудники ${division.name}`"
            :data="users"
            :columns
            :hasPaginate="false"
        />
    </Page>
</template>
