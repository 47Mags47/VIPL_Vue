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
        const contracts =  usePage().props.contracts.data

        return { contracts }
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
                },
                {
                    inputType: 'string',
                    name: 'name',
                    label: 'Нименование',
                },
                {
                    inputType: 'select',
                    name: 'contract_id',
                    label: 'Договор',
                    options: contracts,
                    titleIndex: 'number'
                }
            ]"
        >
        </ResourceForm>
    </AuthLayout>
</template>
