<script>
import { default as VerticalForm } from './VerticalForm.vue';

import { default as StringInput } from '../inputs/StringInput.vue';
import { default as DateInput } from '../inputs/DateInput.vue';
import { default as EmailInput } from '../inputs/EmailInput.vue';
import { default as HiddenInput } from '../inputs/HiddenInput.vue';
import { default as PasswordInput } from '../inputs/PasswordInput.vue';
import { default as CheckBoxInput } from '../inputs/CheckBox.vue';
import { default as TextInput } from '../inputs/TextInput.vue';
import { default as Select } from '../inputs/Select.vue';


export default {
    props: {
        inputs: {
            type: Array,
            default: () => ({}),
            validator: (value) => value.every(input => {
                if (!('name' in input) && input.inputType !== 'hidden')
                    return false

                if (!('inputType' in input))
                    return false

                if (![
                    'string',
                    'date',
                    'email',
                    'password',
                    'hidden',
                    'checkbox',
                    'text',
                    'select'
                ].includes(input.inputType))
                    return false
                return true
            })
        }
    },
    components: {
        VerticalForm,
        StringInput,
        DateInput,
        EmailInput,
        HiddenInput,
        PasswordInput,
        CheckBoxInput,
        TextInput,
        Select
    },
}
</script>

<template>
    <VerticalForm>
        <template v-for="input in inputs">
            <StringInput    v-if="input.inputType === 'string'"     v-bind="input" />
            <DateInput      v-if="input.inputType === 'date'"       v-bind="input" />
            <EmailInput     v-if="input.inputType === 'email'"      v-bind="input" />
            <HiddenInput    v-if="input.inputType === 'hidden'"     v-bind="input" />
            <PasswordInput  v-if="input.inputType === 'password'"   v-bind="input" />
            <CheckBoxInput  v-if="input.inputType === 'checkbox'"   v-bind="input" />

            <TextInput      v-if="input.inputType === 'text'"       v-bind="input" />

            <Select         v-if="input.inputType === 'select'"     v-bind="input" />
        </template>
    </VerticalForm>
</template>
