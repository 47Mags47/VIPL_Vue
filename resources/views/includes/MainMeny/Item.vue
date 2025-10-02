<script>
import { PopUp } from '@components';
import { Ico } from '@components';

export default {
    props: {
        title: {
            type: String,
        },
        ico: {
            type: String,
        },
        childs: {
            type: Array,
            default: null
        },
    },
    components: {
        Ico,
        PopUp,
    },
}
</script>

<template>
    <PopUp vertical="top" horizontal="right">
        <template #body>
            <Ico :type="ico" />
        </template>
        <template #content>
            <template v-if="childs !== null" v-for="item in childs">
                <!-- <Item v-bind="item" /> -->

            </template>
            <template v-else>
                {{ title }}
            </template>
        </template>
    </PopUp>
</template>
