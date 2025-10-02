<script>
import { usePage } from '@inertiajs/vue3';
import { Page, ResourceForm } from '@components'

export default {
    components: {
        Page,
        ResourceForm,
    },
    computed: {
        invite: () => usePage().props.invite.data
    },
}
</script>

<template>
    <Page>
        <ResourceForm
            header="Регистрация"
            sbm="Отправить"
            :action="route('users.store')"
            :inputs="[
                {
                    type: 'hidden',
                    name: 'token',
                    value: invite.token
                },
                {
                    type: 'email',
                    label: 'E-mail',
                    name: 'email',
                    disabled: true,
                    value: invite.email
                },
                {
                    type: 'string',
                    label: 'Роль',
                    name: 'role',
                    disabled: true,
                    value: invite.role.name
                },
                {
                    type: 'string',
                    name: 'last_name',
                    label: 'Фамилия',
                },
                {
                    type: 'string',
                    name: 'first_name',
                    label: 'Имя',
                },
                {
                    type: 'string',
                    name: 'middle_name',
                    label: 'Отчество',
                },
                {
                    type: 'string',
                    name: 'login',
                    label: 'Логин',
                },
                {
                    type: 'password',
                    name: 'password',
                    label: 'Пароль',
                },
                {
                    type: 'password',
                    name: 'password_confirmation',
                    label: 'Повторите пароль',
                },
            ]"
        >
        </ResourceForm>
    </Page>
</template>
