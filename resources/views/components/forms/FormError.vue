<script>
import { usePage } from '@inertiajs/vue3';

export default {
    props: {
        name: {
            type: String,
            required: true,
        },
    },
    computed: {
        getError(){
            return usePage().props.errors[this.name]
        }
    }
}
</script>

<template>
    <div class="form-item-error-container" v-if="getError">
        <span>{{ getError }}</span>
    </div>
</template>

<style lang="sass" scoped>
.form-item-error-container
    width: 100%
    background: $form-error-background
    border: $form-error-border
    padding: 5px 7px
    border-radius: 7px

    span
        font-size: .9rem
        color: $form-error-color
</style>
