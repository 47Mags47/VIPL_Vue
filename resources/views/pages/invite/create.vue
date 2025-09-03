<script>
import { AuthLayout } from '@layouts';
import { ResourceForm } from '@components'
import { usePage } from '@inertiajs/vue3';

export default {
    components: {
        AuthLayout,
        ResourceForm,
    },
    computed: {
        division: () => usePage().props.division.data,
        roles: () => usePage().props.roles.data
    },
}
</script>

<template>
    <AuthLayout>
        <ResourceForm
            header="Отправить приглашение"
            sbm="Отправить"
            :action="route('invites.store', {division: division.id})"
            :inputs="[
                {
                    inputType: 'string',
                    name: 'email',
                    label: 'E-mail',
                },
                {
                    inputType: 'select',
                    name: 'role_id',
                    label: 'роль',
                    options: roles
                },
            ]"
        >
        </ResourceForm>
    </AuthLayout>
</template>
