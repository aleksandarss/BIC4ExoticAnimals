<template>
    <div class="table-container is-fullwidth">
        <table class="table is-fullwidth is-hoverable">
            <thead>
            <tr class="title is-6">
                <table-element element-type="th">Name</table-element>
                <table-element element-type="th">Description</table-element>
                <table-element element-type="th" text-class="has-text-centered">Animals</table-element>
                <table-element element-type="th">Created</table-element>
                <table-element element-type="th">Modified</table-element>
                <table-element element-type="th"></table-element>
            </tr>
            </thead>
            <tbody>
            <tr v-for="species in species" :key="species.id">
                <table-element element-type="td">
                    <a :href="'/species/' + species.slug"
                       :title="species.name" v-text="species.name"/>
                </table-element>
                <table-element element-type="td">{{ species.description }}</table-element>
                <table-element element-type="td" text-class="has-text-centered">{{ species.animals.length }}</table-element>
                <table-element element-type="td">{{ species.created_at | moment('DD.MM.YYYY') }}</table-element>
                <table-element element-type="td">{{ species.updated_at | moment('DD.MM.YYYY') }}</table-element>
                <table-element element-type="td">
                    <p class="buttons">
                        <a :href="'/species/' + species.slug + '/edit'" class="button is-info is-outlined is-small">
                            <span class="icon">
                              <i class="fa fa-edit"></i>
                            </span>
                        </a>
                        <button v-if="!species.animals.length" @click="openDeleteModal(species)" class="button is-danger is-outlined is-small">
                            <span class="icon">
                              <i class="fa fa-remove"></i>
                            </span>
                        </button>
                    </p>
                </table-element>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "SpeciesListComponent",
        props: {
            species: {
                required: true
            }
        },
        components: {
            TableElement
        },
        methods: {
            openDeleteModal(species) {
                this.$emit('open-modal',
                    {
                        id: species.id,
                        title: species.name,
                        content: 'Do you really want to delete this species?',
                        url: '/species/' + species.slug
                    });
            }
        }
    }
</script>

<style scoped>

</style>
