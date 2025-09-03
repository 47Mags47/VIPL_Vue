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
        types: () => usePage().props.types.data
    },
}
</script>

<template>
    <AuthLayout>
        <ResourceForm
            header="Новая запись (Писатель)"
            sbm="Добавить"
            :action="route('writers.store')"
            :inputs="[
                {
                    inputType: 'select',
                    name: 'type_id',
                    label: 'Тип',
                    options: types,
                },
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
                    name: 'class',
                    label: 'Класс',
                },
            ]"
        >
        </ResourceForm>
    </AuthLayout>
</template>
