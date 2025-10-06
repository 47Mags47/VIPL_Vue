<script>
import { Page, ResourceForm } from '@components'
import { usePage } from '@inertiajs/vue3';

export default {
    components: {
        Page,
        ResourceForm,
    },
    computed: {
        paymentEvent: () => usePage().props['payment-event'].data,
        payments: () => usePage().props.payments.data,
    },
}
</script>

<template>
    <Page>
        <ResourceForm
            header="Новая запись (График выплат)"
            sbm="Сохранить"
            method="put"
            :action="route('payment-events.update', { 'payment_event': paymentEvent.id })"
            :inputs="[
                {
                    type: 'date',
                    name: 'date',
                    label: 'Дата',
                    value: paymentEvent.date
                },
                {
                    type: 'select',
                    name: 'payment_id',
                    label: 'Выплата',
                    options: payments,
                    value: paymentEvent.payment
                }
            ]"
        />
    </Page>
</template>
