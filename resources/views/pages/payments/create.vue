<script>
import { usePage } from '@inertiajs/vue3';
import { AuthLayout } from '@layouts';
import { ResourceForm } from '@components'

export default {
    components: {
        AuthLayout,
        ResourceForm,
    },
    computed: {
        laws: () => usePage().props.laws.data
    },
}
</script>

<template>
    <AuthLayout>
        <ResourceForm
            header="Новая запись (Закон)"
            sbm="Добавить"
            :action="route('payments.store')"
            :inputs="[
                {
                    inputType: 'string',
                    name: 'code',
                    label: 'Код',
                },
                {
                    inputType: 'string',
                    name: 'name',
                    label: 'Наименование',
                },
                {
                    inputType: 'string',
                    name: 'kbk',
                    label: 'КБК',
                },
                {
                    inputType: 'select',
                    name: 'law_id',
                    label: 'Закон',
                    options: laws,
                    titleIndex: 'code'
                },
            ]"
        >
        </ResourceForm>
    </AuthLayout>
</template>
