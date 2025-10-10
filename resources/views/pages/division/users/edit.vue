<script>
import { usePage } from '@inertiajs/vue3';
import { Page, ResourceForm } from '@components'


export default {
    components: {
        Page,
        ResourceForm,
    },
    computed: {
        user: () => usePage().props.user.data,
        division: () => usePage().props.division.data,
        roles: () => usePage().props.roles.data
    },
}
</script>

<template>
    <Page>
        <ResourceForm
            header="Информация о пользователе"
            sbm="Сохранить"
            method="put"
            :action="route('division.users.update', { division: division.id, user: user.id})"
            :inputs="[
                {
                    type: 'string',
                    name: 'last_name',
                    label: 'Фамилия',
                    value: user.last_name,
                    disabled: true
                },
                {
                    type: 'string',
                    name: 'first_name',
                    label: 'Имя',
                    value: user.first_name,
                    disabled: true
                },
                {
                    type: 'string',
                    name: 'middle_name',
                    label: 'Отчество',
                    value: user.middle_name,
                    disabled: true
                },
                {
                    type: 'select',
                    name: 'role_id',
                    label: 'роль',
                    options: roles,
                    value: user.role
                },
            ]"
        >
        </ResourceForm>
    </Page>
</template>
