<script>
import { usePage } from '@inertiajs/vue3';
import { Page, ResourceForm } from '@components'


export default {
    components: {
        Page,
        ResourceForm,
    },
    data() {
        const writers =  usePage().props.writers.data

        return { writers }
    },
}
</script>

<template>
    <Page>
        <ResourceForm
            header="Новая запись (Контракт с банком)"
            sbm="Добавить"
            :action="route('bank-contracts.store')"
            :inputs="[
                {
                    type: 'string',
                    name: 'number',
                    label: 'Номер',
                },
                {
                    type: 'date',
                    name: 'signed_at',
                    label: 'Дата заключения',
                },
                {
                    type: 'select',
                    name: 'writer_id',
                    label: 'Писатель',
                    options: writers,
                }
            ]"
        >
        </ResourceForm>
    </Page>
</template>
