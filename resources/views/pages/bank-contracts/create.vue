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
        const writers =  usePage().props.writers.data

        return { writers }
    },
}
</script>

<template>
    <AuthLayout>
        <ResourceForm
            header="Новая запись (Контракт с банком)"
            sbm="Добавить"
            :action="route('bank-contracts.store')"
            :inputs="[
                {
                    inputType: 'string',
                    name: 'number',
                    label: 'Номер',
                },
                {
                    inputType: 'date',
                    name: 'signed_at',
                    label: 'Дата заключения',
                },
                {
                    inputType: 'select',
                    name: 'writer_id',
                    label: 'Писатель',
                    options: writers,
                }
            ]"
        >
        </ResourceForm>
    </AuthLayout>
</template>
