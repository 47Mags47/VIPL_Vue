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
        division: () => usePage().props.division.data,
        users: () => usePage().props.users,
    },
    setup() {
        const columns = [
            {
                title: 'Фамилия',
                dataIndex: 'last_name',
                width: '200px'
            },
            {
                title: 'Имя',
                dataIndex: 'first_name',
                width: '200px'
            },
            {
                title: 'Отчество',
                dataIndex: 'middle_name',
                width: '200px'
            },
            {
                title: 'email',
                dataIndex: 'email',
                width: '250px'
            },
            {
                title: 'Роль',
                dataIndex: ['role', 'name'],
            },
        ]

        return { columns, router }
    },
}
</script>

<template>
    <AuthLayout>
        <ResourceTable
            header="Пользователи"
            :href="route('users.index', {division: division.id})"
            :data="users"
            :columns
            :onAddClick="() => {
                console.log(1);

                router.get(route('invites.create', { division: division.id }))
            }"
            :hasEditButton="false"
            :hasDeleteButton="false"
        />
    </AuthLayout>
</template>
