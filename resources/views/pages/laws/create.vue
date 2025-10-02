<script>
import { Page, ResourceForm } from '@components'

export default {
    components: {
        Page,
        ResourceForm,
    },
}
</script>

<template>
    <Page>
        <ResourceForm
            header="Новая запись (Закон)"
            sbm="Добавить"
            :action="route('laws.store')"
            :inputs="[
                {
                    type: 'string',
                    name: 'code',
                    label: 'Код',
                    value: ''
                },
                {
                    type: 'text',
                    name: 'name',
                    label: 'Наименование',
                    value: ''
                },
            ]"
        >
        </ResourceForm>
    </Page>
</template>
