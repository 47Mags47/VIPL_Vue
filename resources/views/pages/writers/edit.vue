<script>
import { usePage } from '@inertiajs/vue3';
import { Page, ResourceForm } from '@components'


export default {
    components: {
        Page,
        ResourceForm,
    },
    computed: {
        types: () => usePage().props.types.data,
        writer: () => usePage().props.writer.data
    },
}
</script>

<template>
    <Page>
        <ResourceForm
            header="Редактировать запись (Писатель)"
            sbm="Сохранить"
            method="put"
            :action="route('writers.update', { writer: writer.id })"
            :inputs="[
                {
                    type: 'select',
                    name: 'type_id',
                    label: 'Тип',
                    options: types,
                    value: writer.type
                },
                {
                    type: 'string',
                    name: 'code',
                    label: 'Код',
                    value: writer.code,
                },
                {
                    type: 'string',
                    name: 'name',
                    label: 'Наименование',
                    value: writer.name,
                },
                {
                    type: 'string',
                    name: 'class',
                    label: 'Класс',
                    value: writer.class,
                },
            ]"
        >
        </ResourceForm>
    </Page>
</template>
