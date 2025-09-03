<script>
export default {
    props: {
        type: {
            type: String,
            validator(value) {
                return [
                    'flash-error',
                    'flash-success',
                    'flash-warning',
                    'trash',
                    'edit',
                    'search',
                    'add',
                    'array-down',
                    'user',
                    'spinner',
                    'cloud',
                    'double-schevron-left',
                    'double-schevron-right',
                ].includes(value)
            }
        }
    },
    computed: {
        getClass() {
            const classes = {
                'flash-error': 'fa-solid fa-circle-xmark',
                'flash-success': 'fa-solid fa-circle-check',
                'flash-warning': 'fa-solid fa-circle-exclamation',
                'trash': 'fa-solid fa-trash',
                'edit': 'fa-solid fa-pen',
                'search': 'fa-solid fa-magnifying-glass',
                'add': 'fa-solid fa-plus',
                'array-down': 'fa-solid fa-chevron-down',
                'user': 'fa-solid fa-user',
                'spinner': 'fa-solid fa-spinner fa-spin',
                'cloud' : 'fa-solid fa-cloud',
                'double-schevron-left' : 'fa-solid fa-angles-left',
                'double-schevron-right' : 'fa-solid fa-angles-right',
            }
            return classes[this.type]
        }
    }
}
</script>

<template>
    <i :class="getClass"></i>
</template>
