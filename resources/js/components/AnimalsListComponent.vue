<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="column is-three-fifths is-offset-one-fifth">
                <div class="box custom-box">
                    <div class="table-container is-fullwidth">
                    
                        <table class="table is-fullwidth is-hoverable">
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
    const asyncGetAnimals = async () => {
        try {
            return await axios.get('/list/animal');
        } catch (err) {
            throw err;
        }
    }

    const getAnimals = () => {
        return new Promise((resolve, reject) => {
            axios.get('/list/animal')
            .then((res) => {
                console.log('ANIMALS ARE: ', res);
                resolve(res.data);
            })
            .catch((err) => {
                console.error('Something went wrong while fetching animals: ', err);
                reject(err);
            });
        });
    }

    export default {
        name: "AnimalsListComponent",
        data() {
            return {
                animals: [],
                test: "TEST"
            }
        },
        components: {
            TableElement
        },
        created() {
                console.log("CALLING CREATED");
                getAnimals()
                    .then((animals) => {
                        this.animals = animals;
                    })
                    .catch((err) => {
                        console.error(err);
                    });
                console.log("THIS.ANIMALS: ", this.animals);
        }
    }
</script>

<style scoped>

</style>

