<script>
import { usePage } from '@inertiajs/vue3';
import { AuthLayout } from '@layouts';
import { ResourceForm } from '@components'


export default {
    components: {
        AuthLayout,
        ResourceForm,
    },
    data() {
        const law = usePage().props.law.data

        return { law }
    },
}
</script>

<template>
    <AuthLayout>
        <ResourceForm
            header="Редактировать запись (источник финансирования)"
            sbm="Сохранить"
            method="put"
            :action="route('laws.update', { law: law.id })"
            :inputs="[
                {
                    inputType: 'string',
                    name: 'code',
                    label: 'Код',
                    value: law.code
                },
                {
                    inputType: 'text',
                    name: 'name',
                    label: 'Наименование',
                    value: law.name
                },
            ]"
        >
        </ResourceForm>
    </AuthLayout>
</template>
