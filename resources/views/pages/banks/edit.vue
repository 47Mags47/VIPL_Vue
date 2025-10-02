<script>
import { usePage } from '@inertiajs/vue3';
import { Page, ResourceForm } from '@components'


export default {
    components: {
        Page,
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
    <Page>
        <ResourceForm
            header="Новая запись (Банк)"
            sbm="Добавить"
            :action="route('banks.store')"
            :inputs="[
                {
                    type: 'string',
                    name: 'code',
                    label: 'Код',
                    value: bank.code
                },
                {
                    type: 'string',
                    name: 'name',
                    label: 'Нименование',
                    value: bank.name
                },
                {
                    type: 'select',
                    name: 'contract_id',
                    label: 'Договор',
                    options: contracts,
                    titleIndex: 'number',
                    value: bank.contract
                }
            ]"
        >
        </ResourceForm>
    </Page>
</template>
