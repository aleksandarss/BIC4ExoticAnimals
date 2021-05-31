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
            <tr v-for="specimen in species" :key="specimen.id">
                <table-element element-type="td">
                    <a :href="'/species/' + specimen.slug"
                       :title="specimen.name" v-text="specimen.name"/>
                </table-element>
                <table-element element-type="td">{{ specimen.description }}</table-element>
                <table-element element-type="td" text-class="has-text-centered">{{ specimen.animals.length }}</table-element>
                <table-element element-type="td">{{ specimen.created_at | moment('DD.MM.YYYY') }}</table-element>
                <table-element element-type="td">{{ specimen.updated_at | moment('DD.MM.YYYY') }}</table-element>
                <table-element element-type="td">
                    <p class="buttons">
                        <a :href="'/species/' + specimen.slug + '/edit'" class="button is-info is-outlined is-small">
                            <span class="icon">
                              <i class="fa fa-edit"></i>
                            </span>
                        </a>
                        <button :disabled="specimen.animals.length > 0" @click="openDeleteModal(specimen)" class="button is-danger is-outlined is-small">
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
        data() {
            return {
                species: getSpecies()
            }
        },
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
