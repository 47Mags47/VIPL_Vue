<script>
import { usePage } from '@inertiajs/vue3';
import { GuestWebLayout } from '@layouts';
import { ResourceForm } from '@components'

export default {
    components: {
        GuestWebLayout,
        ResourceForm,
    },
    computed: {
        invite: () => usePage().props.invite.data
    },
}
</script>

<template>
    <GuestWebLayout>
        <ResourceForm
            header="Регистрация"
            sbm="Отправить"
            :action="route('users.store')"
            :inputs="[
                {
                    inputType: 'hidden',
                    name: 'token',
                    value: invite.token
                },
                {
                    inputType: 'email',
                    label: 'E-mail',
                    name: 'email',
                    disabled: true,
                    value: invite.email
                },
                {
                    inputType: 'string',
                    label: 'Роль',
                    name: 'role',
                    disabled: true,
                    value: invite.role.name
                },
                {
                    inputType: 'string',
                    name: 'last_name',
                    label: 'Фамилия',
                },
                {
                    inputType: 'string',
                    name: 'first_name',
                    label: 'Имя',
                },
                {
                    inputType: 'string',
                    name: 'middle_name',
                    label: 'Отчество',
                },
                {
                    inputType: 'string',
                    name: 'login',
                    label: 'Логин',
                },
                {
                    inputType: 'password',
                    name: 'password',
                    label: 'Пароль',
                },
                {
                    inputType: 'password',
                    name: 'password_confirmation',
                    label: 'Повторите пароль',
                },
            ]"
        >
        </ResourceForm>
    </GuestWebLayout>
</template>
