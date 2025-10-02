<script>
import { usePage } from '@inertiajs/vue3';
import { Page, ResourceForm } from '@components'

export default {
    components: {
        Page,
        ResourceForm,
    },
    computed: {
        payment: () => usePage().props.payment.data,
        laws: () => usePage().props.laws.data
    },
}
</script>

<template>
    <Page>
        <ResourceForm
            header="Редактировать запись (Закон)"
            sbm="Сохранить"
            method="put"
            :action="route('payments.update', { payment: payment.id })"
            :inputs="[
                {
                    type: 'string',
                    name: 'code',
                    label: 'Код',
                    value: payment.code
                },
                {
                    type: 'string',
                    name: 'name',
                    label: 'Наименование',
                    value: payment.name
                },
                {
                    type: 'string',
                    name: 'kbk',
                    label: 'КБК',
                    value: payment.kbk
                },
                {
                    type: 'select',
                    name: 'law_id',
                    label: 'Закон',
                    options: laws,
                    titleIndex: 'code',
                    value: payment.law
                },
            ]"
        >
        </ResourceForm>
    </Page>
</template>
