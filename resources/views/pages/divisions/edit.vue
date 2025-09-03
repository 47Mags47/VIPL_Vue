<script>
import { usePage } from '@inertiajs/vue3';
import { AuthLayout } from '@layouts';
import { ResourceForm } from '@components'


export default {
    components: {
        AuthLayout,
        ResourceForm,
    },
    data() {
        const division = usePage().props.division.data

        return { division }
    },
}
</script>

<template>
    <AuthLayout>
        <ResourceForm
            header="Редактировать запись (подращделение)"
            sbm="Сохранить"
            method="put"
            :action="route('divisions.update', { division: division.id })"
            :inputs="[
                {
                    inputType: 'string',
                    name: 'name',
                    label: 'Наименование',
                    value: division.name
                },
            ]"
        >
        </ResourceForm>
    </AuthLayout>
</template>
