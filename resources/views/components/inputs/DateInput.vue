<script>
import { DateTime } from 'luxon';
import { default as BaseInput } from './BaseInput.vue';


export default {
    components: {
        BaseInput
    },
    props: {
        value: {
            type: String,
            value: ''
        }
    },
    computed: {
        getValue(){
            return this.value !== ''
                ? DateTime.fromISO(this.value).setLocale('ru')
                : DateTime.now()
        }
    }
}
</script>

<template>
    <BaseInput
        type="date"
        :placeholder="$attrs.placeholder ?? '__.__.____'"
        :value="getValue.toFormat('yyyy-MM-dd')"
    />
</template>
