<script>
import { usePage } from '@inertiajs/vue3';
import { Page, ResourceForm } from '@components'

export default {
    components: {
        Page,
        ResourceForm,
    },
    computed: {
        laws: () => usePage().props.laws.data
    },
}
</script>

<template>
    <Page>
        <ResourceForm
            header="Новая запись (Закон)"
            sbm="Добавить"
            :action="route('payments.store')"
            :inputs="[
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
                    name: 'kbk',
                    label: 'КБК',
                },
                {
                    type: 'select',
                    name: 'law_id',
                    label: 'Закон',
                    options: laws,
                    titleIndex: 'code'
                },
            ]"
        >
        </ResourceForm>
    </Page>
</template>
