<script>
import { usePage } from '@inertiajs/vue3';
import { Page, ResourceForm } from '@components'


export default {
    components: {
        Page,
        ResourceForm,
    },
    computed: {
        types: () => usePage().props.types.data
    },
}
</script>

<template>
    <Page>
        <ResourceForm
            header="Новая запись (Писатель)"
            sbm="Добавить"
            :action="route('writers.store')"
            :inputs="[
                {
                    type: 'select',
                    name: 'type_id',
                    label: 'Тип',
                    options: types,
                },
                {
                    type: 'string',
                    name: 'code',
                    label: 'Код',
                },
                {
                    type: 'string',
                    name: 'name',
                    label: 'Наименование',
                },
                {
                    type: 'string',
                    name: 'class',
                    label: 'Класс',
                },
            ]"
        >
        </ResourceForm>
    </Page>
</template>
