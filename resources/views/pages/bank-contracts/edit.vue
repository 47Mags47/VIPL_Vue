<script>
import { usePage } from '@inertiajs/vue3';
import { Page, ResourceForm } from '@components'


export default {
    components: {
        Page,
        ResourceForm,
    },
    data() {
        const bankContract =  usePage().props.bankContract.data
        const writers =  usePage().props.writers.data

        return { bankContract, writers }
    },
}
</script>

<template>
    <Page>
        <ResourceForm
            header="Редактировать запись (Контракт с банком)"
            sbm="Сохранить"
            method="put"
            :action="route('bank-contracts.update', {bank_contract: bankContract.id})"
            :inputs="[
                {
                    type: 'string',
                    name: 'number',
                    label: 'Номер',
                    value: bankContract.number,
                },
                {
                    type: 'date',
                    name: 'signed_at',
                    label: 'Дата заключения',
                    value: bankContract.signed_at,
                },
                {
                    type: 'select',
                    name: 'writer_id',
                    label: 'Писатель',
                    options: writers,
                    value: bankContract.writer
                }
            ]"
        >
        </ResourceForm>
    </Page>
</template>
