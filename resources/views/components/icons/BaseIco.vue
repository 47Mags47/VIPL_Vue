<script>
export default{
    props: {
        type:{
            type: String,
            validator(value) {
                return [
                    'flash-error',
                    'flash-success',
                    'flash-warning'
                ].includes(value)
            }
        }
    },
    computed: {
        getClass(){
            const classes = {
                'flash-error': 'fa-solid fa-circle-xmark',
                'flash-success': 'fa-solid fa-circle-check',
                'flash-warning': 'fa-solid fa-circle-exclamation',
            }
            return classes[this.type]
        }
    }
}
</script>

<template>
    <i :class="getClass"></i>
</template>
