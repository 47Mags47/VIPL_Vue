<script>
import { AuthLayout } from '@layouts';
import { ResourceForm } from '@components'
import { usePage } from '@inertiajs/vue3';

export default {
    components: {
        AuthLayout,
        ResourceForm,
    },
    data() {
        const bank =  usePage().props.bank.data
        const contracts =  usePage().props.contracts.data

        return { contracts, bank }
    },
}
</script>

<template>
    <AuthLayout>
        <ResourceForm
            header="Новая запись (Банк)"
            sbm="Добавить"
            :action="route('banks.store')"
            :inputs="[
                {
                    inputType: 'string',
                    name: 'code',
                    label: 'Код',
                    value: bank.code
                },
                {
                    inputType: 'string',
                    name: 'name',
                    label: 'Нименование',
                    value: bank.name
                },
                {
                    inputType: 'select',
                    name: 'contract_id',
                    label: 'Договор',
                    options: contracts,
                    titleIndex: 'number',
                    value: bank.contract
                }
            ]"
        >
        </ResourceForm>
    </AuthLayout>
</template>
