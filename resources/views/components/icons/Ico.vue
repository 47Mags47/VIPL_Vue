<script>

export default {
    props: {
        type: {
            type: String,
        }
    },
}
</script>

<template>
    <font-awesome-icon class="ico" :icon="['fas', type]" />
</template>
