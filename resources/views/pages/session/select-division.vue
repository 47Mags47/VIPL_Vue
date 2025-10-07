<script>
import { GuestWebLayout } from '@layouts'
import { VerticalForm } from '@components'
import { router, usePage } from '@inertiajs/vue3';

export default {
    components: {
        GuestWebLayout,
        VerticalForm
    },
    computed: {
        divisions: () => usePage().props.divisions.data
    },
    methods: {
        selectDivisionHandler(division){
            router.post(route('session.select-division.post'), { division_id:division.id })
        }
    }
}
</script>

<template>
    <GuestWebLayout>
        <VerticalForm
            header="Необходимо выбрать организацию"
            :sbm="false"
        >
            <div class="division-list">
                <template v-for="division in divisions">
                    <div class="division" :onClick="() => selectDivisionHandler(division)">
                        <span class="division-name">{{ division.name }}</span>
                    </div>
                </template>
            </div>
        </VerticalForm>
    </GuestWebLayout>
</template>

<style lang="sass">
.division-list
    display: flex
    flex-direction: column
    gap: 3px
    .division
        padding: 10px

        color: $color
        border-radius: $default-border-radius
        transition: .5s

        cursor: pointer
        &:hover
            background: $input-border-color
            color: white
        .division-name
            font-size: 1.5rem

</style>
