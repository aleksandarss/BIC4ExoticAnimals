<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="column">
                <div class="box custom-box">
                    <animals-list :animals="animals"></animals-list>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import AnimalsList from './AnimalsListComponent';

    const getAnimals = () => {
        return new Promise((resolve, reject) => {
            axios.get('/list/animal')
            .then(response => {
                resolve(response.data);
            })
            .catch(err => {
                reject(err);
            })
        })
    }

    export default {
        components: {
            AnimalsList
        },
        name: "AnimalsComponent",
        data() {
            return {
                animals: []
            }
        },
        created() {
            getAnimals()
                .then(animals => {
                    this.animals = animals;
                })
                .catch(err => console.error(err));
        },
    }

</script>
