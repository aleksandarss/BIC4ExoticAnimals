<template>
    <component :is="elementType">
        <div class="columns">
            <div :class="columnClass">
                <slot></slot>
            </div>
        </div>
    </component>
</template>

<script>
    export default {
        name: "TableElementComponent",
        props:{
            textClass: {
                type: String,
                default: 'column has-text-left',
                required: false
            },
            elementType: {
                type: String,
                required: true
            }
        },
        computed: {
            columnClass() {
                return "column " + this.textClass;
            }
        }
    }
</script>

<style scoped>

</style>
