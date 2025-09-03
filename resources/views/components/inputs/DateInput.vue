<script>
import { default as BaseInput } from './BaseInput.vue';


export default {
    components: {
        BaseInput
    },
}
</script>

<template>
    <BaseInput
        type="date"
        :placeholder="$attrs.placeholder ?? '__.__.____'"
    />
</template>
