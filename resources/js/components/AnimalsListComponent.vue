<template>
    <div class="table-container is-fullwidth">
        <div class="table is-fullwidth is hoverable">
            <thead>
            <tr class="title is6">
                <table-element element-type="th">Name</table-element>
                <table-element element-type="th">Description</table-element>
                <table-element element-type="th">Species</table-element>
                <table-element element-type="th">Created</table-element>
                <table-element element-type="th">Modified</table-element>
                <table-element element-type="th"></table-element>
            </tr>
            </thead>
</template>

<script>
    const getAnimals = () => {
        return new Promise((resolve, reject) => {
            axios.get('/list/animals')
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
        methods: {
            created() {
                
            }
        }
    }
</script>
