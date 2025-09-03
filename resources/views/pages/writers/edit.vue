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
        types: () => usePage().props.types.data,
        writer: () => usePage().props.writer.data
    },
}
</script>

<template>
    <AuthLayout>
        <ResourceForm
            header="Редактировать запись (Писатель)"
            sbm="Сохранить"
            method="put"
            :action="route('writers.update', { writer: writer.id })"
            :inputs="[
                {
                    inputType: 'select',
                    name: 'type_id',
                    label: 'Тип',
                    options: types,
                    value: writer.type
                },
                {
                    inputType: 'string',
                    name: 'code',
                    label: 'Код',
                    value: writer.code,
                },
                {
                    inputType: 'string',
                    name: 'name',
                    label: 'Наименование',
                    value: writer.name,
                },
                {
                    inputType: 'string',
                    name: 'class',
                    label: 'Класс',
                    value: writer.class,
                },
            ]"
        >
        </ResourceForm>
    </AuthLayout>
</template>
