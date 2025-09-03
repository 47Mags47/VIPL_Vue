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
            header="Новая запись (подразделение)"
            sbm="Добавить"
            :action="route('divisions.store')"
            :inputs="[
                {
                    inputType: 'string',
                    name: 'name',
                    label: 'Наименование',
                },
            ]"
        >
        </ResourceForm>
    </AuthLayout>
</template>
