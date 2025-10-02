<script>

export default {
    slots: [
        'before',
        'thead',
        'tbody',
        'after',
    ],
    props: {
        header: {
            type: String,
            default: null
        },
        class: {
            type: [String, Object, Array],
            default: null
        },
    },
    methods: {
        getContainerClasses() {
            let classes = { 'table-box-container': true }

            if (this.class !== null) {
                if (Array.isArray(this.class))
                    this.class.map((name) => classes[name + '-container'] = true)
                else if (typeof this.class == 'object')
                    Object.keys(this.class).map((key) => classes[key + '-container'] = true)
                else if (typeof this.class == 'string')
                    classes[this.class + '-container'] = true
            }

            return classes
        },
        getTableClasses() {
            let classes = { 'table': true }

            if (this.class !== null) {
                if (Array.isArray(this.class))
                    this.class.map((name) => classes[name] = true)
                else if (typeof this.class == 'object')
                    Object.keys(this.class).map((key) => classes[key] = true)
                else if (typeof this.class == 'string')
                    classes[this.class] = true
            }

            return classes
        }
    },
    computed: {
        bind() {
            return {
                header: {
                    visible: this.header !== null,
                    text: this.header
                },
                container: {
                    classes: this.getContainerClasses()
                },
                table: {
                    classes: this.getTableClasses()
                },
            }
        }
    },
}
</script>

<template>
    <div :class="bind.container.classes">
        <div class="before-table-container">
            <div class="table-header-container">
                <h3 v-if="bind.header.visible">{{ bind.header.text }}</h3>
            </div>
            <slot name="before" />
        </div>
        <div class="table-container">
            <table :class="bind.table.classes">
                <thead>
                    <slot name="thead" />
                </thead>
                <tbody>
                    <slot name="tbody" />
                </tbody>
            </table>
        </div>
        <div class="after-table-container">
            <slot name="after" />
        </div>
    </div>
</template>

<style lang="sass">
.table-box-container
    width: 100%
    height: 100%

    display: flex
    flex-direction: column
    gap: 5px

    overflow: auto
    @include scroll
    .before-table-container
        display: flex
        flex-direction: column
        gap: 10px
        padding: 15px
        .table-header-container
            text-align: center
    .table-container
        flex: 1
        padding: 0 10px
        .table
            width: 100%
            border-collapse: collapse
            thead th
                border: $table-border
            tbody td
                border: $table-border
</style>
