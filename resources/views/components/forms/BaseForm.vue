<script>
import { Form } from '@inertiajs/vue3'

export default {
    components: {
        Form,
    },
    slots: [
        'default'
    ],
    props: {
        class: {
            type: [String, Object, Array],
            default: null
        },
        action: {
            type: String,
            default: location.href
        },
        method: {
            type: String,
            default: 'post',
            validator(value) {
                return ['get', 'post', 'put', 'delete'].includes(value)
            }
        },
    },
    methods:{
        getContainerClasses(){
            let classes = { 'form-container': true }

            if(this.class !== null){
                if(Array.isArray(this.class))
                    this.class.map((name) => classes[name + '-container'] = true)
                else if(typeof this.class == 'object')
                    Object.keys(this.class).map((key) => classes[key + '-container'] = true)
                else if(typeof this.class == 'string')
                    classes[this.class + '-container'] = true
            }

            return classes
        },
        getFormClasses(){
            let classes = { 'form': true }

            if(this.class !== null){
                if(Array.isArray(this.class))
                    this.class.map((name) => classes[name] = true)
                else if(typeof this.class == 'object')
                    Object.keys(this.class).map((key) => classes[key] = true)
                else if(typeof this.class == 'string')
                    classes[this.class] = true
            }

            return classes
        }
    },
    computed: {
        bind(){
            return {
                container: {
                    classes: this.getContainerClasses()
                },
                form:{
                    action: this.action,
                    method: this.method,
                    classes: this.getFormClasses()
                },
            }
        }
    },
}
</script>

<template>
    <div :class="bind.container.classes">
        <Form
            :action="bind.form.action"
            :method="bind.form.method"
            :class="bind.form.classes"
        >
            <slot name="default" />
        </Form>
    </div>
</template>

<style lang="sass">
.form-container
    width: 100%
    height: 100%
</style>
