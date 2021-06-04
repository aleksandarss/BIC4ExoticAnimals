<template>
    <div class="container">
        <!-- Head -->
        <section class="hero">
            <div class="hero-body">
                <div class="container has-text-centered">
                <div class="hero-body"> 
                    <p class="customFontColor title is-size-1">The list of all registered animals!</p>
                </div>
                <h2 class="subtitle">See all animals registered in our system.</h2>
                </div>
            </div>
        </section>
        <div class="columns is-multiline">
            <div class="column">
                <div class="box custom-box">
                    <div class="table-container is-fullwidth">
                        <table class="table table is-striped is-fullwidth is-hoverable">
                            <thead>
                                <tr class="title is-5">
                                    <table-element element-type="th">Name</table-element>
                                    <table-element element-type="th">Description</table-element>
                                    <table-element element-type="th">Species</table-element>
                                    <table-element element-type="th">Created</table-element>
                                    <table-element element-type="th">Modified</table-element>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="animal in animals" :key="animal.id">
                                    <table-element element-type="td">{{animal.name}}</table-element>
                                    <table-element element-type="td">{{animal.description}}</table-element>
                                    <table-element element-type="td">{{animal.species.name}}</table-element>
                                    <table-element element-type="td">{{animal.created_at}}</table-element>
                                    <table-element element-type="td">{{animal.updated_at}}</table-element>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
   export default {
        name: "AnimalsFormComponent",
        data() {
            return {
                animal: getAnimal()
            }
        },
        props: {
            animal: {
                required: true
            }
        },
        components: {
            TableElement
        },
        methods: {
            openDeleteModal(animal) {
                this.$emit('open-modal',
                    {
                        id: animal.id,
                        title: animal.name,
                        content: 'Do you really want to delete this animal?',
                        url: '/animal/' + animal.slug
                    });
            }
        }
    }
</script>

<style scoped>

</style>

