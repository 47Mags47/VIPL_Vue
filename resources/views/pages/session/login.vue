<script>
import { GuestWebLayout } from "@layouts";
import { ResourceForm } from '@components'

export default {
    components: {
        GuestWebLayout,
        ResourceForm
    },
    data() {
        return {
            login: null,
            password: null,
            remember: false,
        }
    },
}

</script>

<template>
    <GuestWebLayout>
        <ResourceForm
            header="Вход"
            sbm="Войти"
            :action="route('session.store')"
            :inputs="[
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
                    inputType: 'checkbox',
                    name: 'remember',
                    label: 'Запомнить меня',
                },
            ]"
        />
    </GuestWebLayout>
</template>
