<template>
    <div class="table-container is-fullwidth">
        <table class="table is-fullwidth is-hoverable">
            <thead>
                <tr class="title is-6">
                    <table-element element-type="th">Name</table-element>
                    <table-element element-type="th">Description</table-element>
                    <table-element element-type="th">Species</table-element>
                    <table-element element-type="th">Created</table-element>
                    <table-element element-type="th">Modified</table-element>
                    <table-element element-type="th"></table-element>
                </tr>
            </thead>
            <tbody>
                <tr v-for="animal in animals" :key="animal.id">
                    <table-element element-type="td">{{animal.name}}</table-element>
                    <table-element element-type="td">{{animal.description}}</table-element>
                    <table-element element-type="td">{{animal.species.name}}</table-element>
                    <table-element element-type="td">{{animal.created_at}}</table-element>
                    <table-element element-type="td">{{animal.updated_at}}</table-element>
                    <table-element element-type="td">
                        <p class="buttons">
                            <a :href="'/animal/' + animal.slug + '/edit'" class="button is-info is-outlined ">
                                <span class="icon">
                                <i class="fa fa-edit"></i>
                                </span>
                            </a>
                            <button @click="openDeleteModal(animal)" class="button is-danger is-outlined">
                                <span class="icon">
                                <i class="fa fa-remove"></i>
                                </span>
                            </button>
                        </p>
                    </table-element>
                </tr>
            </tbody>
        </table>
    <p class="float-end button is-rounded"><a class="has-text-black" href="#"><i class="fas fa-arrow-up"></i>&nbsp;Back to top</a></p>
    </div>
</template>

<script>
   export default {
        name: "AnimalsFormComponent",
        data() {
            return {
                
            }
        },
        props: {
            animals: {
                required: true
            }
        },
        components: {
            TableElement
        },
        methods: {
            openDeleteModal(animal) {
                console.log("OPENING DELETE MODAL ...");
                this.$emit('open-modal',
                    {
                        id: animal.id,
                        title: animal.name,
                        content: 'Do you really want to delete this animal?',
                        url: '/animal/' + animal.slug
                    });
            }
        },
        created() {
            console.log("LIST COMPONENT CALLED!");
        }
    }
</script>

<style scoped>

</style>

