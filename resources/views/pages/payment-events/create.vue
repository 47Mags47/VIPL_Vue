<script>
import { Page, ResourceForm } from '@components'
import { usePage } from '@inertiajs/vue3';

export default {
    components: {
        Page,
        ResourceForm,
    },
    computed: {
        payments: () => usePage().props.payments.data,
    },
}
</script>

<template>
    <Page>
        <ResourceForm
            header="Новая запись (График выплат)"
            sbm="Добавить"
            :action="route('payment-events.store')"
            :inputs="[
                {
                    type: 'date',
                    name: 'date',
                    label: 'Дата',
                },
                {
                    type: 'select',
                    name: 'payment_id',
                    label: 'Выплата',
                    options: payments,
                }
            ]"
        />
    </Page>
</template>
