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
            header="Новая запись (организация)"
            sbm="Добавить"
            :action="route('divisions.store')"
            :inputs="[
                {
                    type: 'string',
                    name: 'name',
                    label: 'Наименование',
                    placeholder: 'МБУ ЦСОН'
                },
            ]"
        >
        </ResourceForm>
    </Page>
</template>
