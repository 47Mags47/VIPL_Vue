<script>
import { usePage } from '@inertiajs/vue3';
import { Page, ResourceForm } from '@components'


export default {
    components: {
        Page,
        ResourceForm,
    },
    data() {
        const contracts =  usePage().props.contracts.data

        return { contracts }
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
                },
                {
                    type: 'string',
                    name: 'name',
                    label: 'Нименование',
                },
                {
                    type: 'select',
                    name: 'contract_id',
                    label: 'Договор',
                    options: contracts,
                    titleIndex: 'number'
                }
            ]"
        >
        </ResourceForm>
    </Page>
</template>
