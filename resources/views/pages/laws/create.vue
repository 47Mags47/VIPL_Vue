<script>
import { AuthLayout } from '@layouts';
import { ResourceForm } from '@components'

export default {
    components: {
        AuthLayout,
        ResourceForm,
    },
}
</script>

<template>
    <AuthLayout>
        <ResourceForm
            header="Новая запись (Закон)"
            sbm="Добавить"
            :action="route('laws.store')"
            :inputs="[
                {
                    inputType: 'string',
                    name: 'code',
                    label: 'Код',
                    value: ''
                },
                {
                    inputType: 'text',
                    name: 'name',
                    label: 'Наименование',
                    value: ''
                },
            ]"
        >
        </ResourceForm>
    </AuthLayout>
</template>
