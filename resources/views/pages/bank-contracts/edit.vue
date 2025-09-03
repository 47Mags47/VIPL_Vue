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
        const bankContract =  usePage().props.bankContract.data
        const writers =  usePage().props.writers.data

        return { bankContract, writers }
    },
}
</script>

<template>
    <AuthLayout>
        {{ console.log(bankContract) }}
        <ResourceForm
            header="Редактировать запись (Контракт с банком)"
            sbm="Сохранить"
            method="put"
            :action="route('bank-contracts.update', {bank_contract: bankContract.id})"
            :inputs="[
                {
                    inputType: 'string',
                    name: 'number',
                    label: 'Номер',
                    value: bankContract.number,
                },
                {
                    inputType: 'date',
                    name: 'signed_at',
                    label: 'Дата заключения',
                    value: bankContract.signed_at,
                },
                {
                    inputType: 'select',
                    name: 'writer_id',
                    label: 'Писатель',
                    options: writers,
                    value: bankContract.writer
                }
            ]"
        >
        </ResourceForm>
    </AuthLayout>
</template>
