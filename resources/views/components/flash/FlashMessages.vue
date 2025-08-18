<script>
import { computed } from 'vue';
import { Ico } from '../icons';
import { usePage } from '@inertiajs/vue3';


export default {
    components: {
        Ico,
    },
    setup() {
        const flash = computed(() => usePage().props.flash)
        return { flash }
    }
}
</script>

<template>
    <div class="flash-messages-container">
        <div class="flash-message-container" v-for="(messages, type) in flash" :key="type">
            <div :class="['flash-message', type]" v-for="(message, index) in messages" :key="`${index}-${Date.now()}`">
                <Ico v-if="type === 'success'" type="flash-success" />
                <Ico v-if="type === 'error'" type="flash-error" />
                <Ico v-if="type === 'warning'" type="flash-warning" />
                <span>{{ message }}</span>
            </div>
        </div>

    </div>
</template>

<style lang="sass" src="@style/flash-messages.sass" scoped />
