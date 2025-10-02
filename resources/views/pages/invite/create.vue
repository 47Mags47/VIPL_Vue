<script>
import { usePage } from '@inertiajs/vue3';
import { Page, ResourceForm } from '@components'


export default {
    components: {
        Page,
        ResourceForm,
    },
    computed: {
        division: () => usePage().props.division.data,
        roles: () => usePage().props.roles.data
    },
}
</script>

<template>
    <Page>
        <ResourceForm
            header="Отправить приглашение"
            sbm="Отправить"
            :action="route('invites.store', {division: division.id})"
            :inputs="[
                {
                    type: 'string',
                    name: 'email',
                    label: 'E-mail',
                },
                {
                    type: 'select',
                    name: 'role_id',
                    label: 'роль',
                    options: roles
                },
            ]"
        >
        </ResourceForm>
    </Page>
</template>
