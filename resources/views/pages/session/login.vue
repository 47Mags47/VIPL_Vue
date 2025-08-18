<script>
import { GuestWebLayout as Layout } from "@layouts";
import { VerticalForm as Form, StringInput, PasswordInput, CheckBox } from '@components'


export default {
    components: {
        Layout,
        Form,
        StringInput,
        PasswordInput,
        CheckBox
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
    <Layout>
        <Form header="Вход">
            <StringInput name="login" label="Логин" :value="login" autocomplete="on"
                @update:value="(val) => (login = val)" />
            <PasswordInput name="password" label="Пароль" :value="password" autocomplete="on"
                @update:value="(val) => (password = val)" />
            <CheckBox name="remember" label="Запомнить меня"
                @update:value="(val) => (remember = val)" />
        </Form>
    </Layout>
</template>
