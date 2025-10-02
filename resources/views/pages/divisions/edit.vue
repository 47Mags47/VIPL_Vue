<script>
import { usePage } from '@inertiajs/vue3';
import { Page, ResourceForm } from '@components'


export default {
    components: {
        Page,
        ResourceForm,
    },
    data() {
        const division = usePage().props.division.data

        return { division }
    },
}
</script>

<template>
    <Page>
        <ResourceForm
            header="Редактировать запись (подращделение)"
            sbm="Сохранить"
            method="put"
            :action="route('divisions.update', { division: division.id })"
            :inputs="[
                {
                    type: 'string',
                    name: 'name',
                    label: 'Наименование',
                    value: division.name,
                    placeholder: division.name
                },
            ]"
        >
        </ResourceForm>
    </Page>
</template>
