<script>
import { defineAsyncComponent } from 'vue';
import VerticalForm from './VerticalForm.vue';

export default {
    components: {
        VerticalForm,
        StringInput: defineAsyncComponent(() => import('../inputs/StringInput.vue')),
        DateInput: defineAsyncComponent(() => import('../inputs/DateInput.vue')),
        EmailInput: defineAsyncComponent(() => import('../inputs/EmailInput.vue')),
        HiddenInput: defineAsyncComponent(() => import('../inputs/HiddenInput.vue')),
        PasswordInput: defineAsyncComponent(() => import('../inputs/PasswordInput.vue')),
        CheckBox: defineAsyncComponent(() => import('../inputs/CheckBox.vue')),
        TextInput: defineAsyncComponent(() => import('../inputs/TextInput.vue')),
        Select: defineAsyncComponent(() => import('../inputs/Select.vue')),
    },
    props: {
        inputs: {
            type: Array,
            default: [],
            validator: (value) => value.every(input => {
                if (typeof input !== 'object') {
                    console.error('Переданое значение не является объектом')
                    return
                }

                let validTypes = ['string', 'date', 'email', 'password', 'hidden', 'checkbox', 'text', 'select']
                if (!validTypes.includes(input.type)) {
                    console.error(`Невозможный type: ${input.type}`)
                    return
                }

                return true
            })
        }
    },
    computed: {
        bind() {
            return {
                inputs: this.inputs,
            }
        },
    },
    methods:{
        getInputBind(input){
            delete input.type

            return input
        }
    },
}
</script>

<template>
    <VerticalForm>
        <template v-for="input in bind.inputs">
            <StringInput    v-if="input.type === 'string'"      v-bind="getInputBind(input)" />
            <DateInput      v-if="input.type === 'date'"        v-bind="getInputBind(input)" />
            <EmailInput     v-if="input.type === 'email'"       v-bind="getInputBind(input)" />
            <HiddenInput    v-if="input.type === 'hidden'"      v-bind="getInputBind(input)" />
            <PasswordInput  v-if="input.type === 'password'"    v-bind="getInputBind(input)" />
            <CheckBox       v-if="input.type === 'checkbox'"    v-bind="getInputBind(input)" />
            <TextInput      v-if="input.type === 'text'"        v-bind="getInputBind(input)" />
            <Select         v-if="input.type === 'select'"      v-bind="getInputBind(input)" />
        </template>
    </VerticalForm>
</template>
