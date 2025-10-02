<script>
import { usePage } from '@inertiajs/vue3';
import { Page, ResourceForm } from '@components'


export default {
    components: {
        Page,
        ResourceForm,
    },
    data() {
        const law = usePage().props.law.data

        return { law }
    },
}
</script>

<template>
    <Page>
        <ResourceForm
            header="Редактировать запись (источник финансирования)"
            sbm="Сохранить"
            method="put"
            :action="route('laws.update', { law: law.id })"
            :inputs="[
                {
                    type: 'string',
                    name: 'code',
                    label: 'Код',
                    value: law.code
                },
                {
                    type: 'text',
                    name: 'name',
                    label: 'Наименование',
                    value: law.name
                },
            ]"
        >
        </ResourceForm>
    </Page>
</template>
