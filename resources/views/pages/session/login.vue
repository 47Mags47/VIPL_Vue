<script>
import { Page, ResourceForm } from '@components'

export default {
    components: {
        Page,
        ResourceForm
    },
}

</script>

<template>
    <Page>
        <ResourceForm
            header="Вход"
            sbm="Войти"
            :action="route('session.store')"
            :inputs="[
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
                    type: 'checkbox',
                    name: 'remember',
                    label: 'Запомнить меня',
                },
            ]"
        />
    </Page>
</template>
