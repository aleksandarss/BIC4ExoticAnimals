<template>
    <div class="container">
        <h1 class="title pb-3 fs-1 customHeaderColorSpeciesList text-center"> Create an animal </h1>
        <p class="customHeaderColorSpeciesList pb-5 fs-4 text-center">Here you can register a new animal to the system.</p>
        <div class="columns is-multiline">
            <div class="card blog-card column is-half is-offset-one-quarter bg-dark">
                <header class="card-header">
                    <h1 class="card-header-title is-centered" v-text="edit ? form.name : 'New animal'"/>
                </header>
                <div class="card-content">
                    <div class="content">
                        <query-message :success="form.isSuccess()" :fail="form.isFail()"
                                       :message="form.failMessage || form.successMessage">
                        </query-message>
                        <form @submit.prevent="submit">
                            <div class="field" v-if="!edit">
                                <label class="label text-white" for="name">Name</label>
                                <div class="control">
                                    <input id="name"
                                           v-model="form.name"
                                           class="input"
                                           v-bind:class="{ 'is-danger': form.errors.has('name')}"
                                           type="text" autofocus>
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('name')"
                                   v-text="form.errors.get('name')"/>
                            </div>

                            <div class="field">
                                <label class="label text-white" for="description">Description</label>
                                <div class="control">
                                    <textarea id="description" v-model="form.description" class="textarea"></textarea>
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('description')"
                                   v-text="form.errors.get('description')"/>
                            </div>
                            <div class="field">
                                <label class="label" for="species">Species</label>
                                <div class="control">
                                    <div class="select is-fullwidth" :class="loading ? 'is-loading' : ''">
                                        <select id="species" :disabled="loading" v-model="form.species_id">
                                            <option v-if="loading" :value="this.form.species_id"> Loading...</option>
                                            <option v-for="spec in species" v-if="!loading" v-text="spec.name"
                                                    :value="spec.id"/>
                                        </select>
                                    </div>
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('species_id')"
                                   v-text="form.errors.get('species_id')"/>
                                <p v-if="noSpecies" class="help is-warning">Add some Species to create blogs!</p>
                            </div>

                            <button type="submit" class="button is-large is-primary is-outlined is-fullwidth"
                                    v-text="edit ? 'Update' : 'Save'" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    let form = new Form({
        'animal_id': '',
        'species_id': '',
        'name': '',
        'description': '',
        'noReset': ['species_id']
    });


    const getSpecies = () => {
        return new Promise((resolve, reject) => {
            axios.get('/list/species')
            .then((response) => {
                console.log("LOADED SPECIES: ", response);

                resolve(response.data);
            })
            .catch((err) => {
                console.error("Something went wrong while fetching species: ", err);
                reject(err);
            });
        });
    }

    export default {
        name: "SpeciesFormComponent",
        components: {
            QueryMessage
        },
        props: {
            isEditable: {
                required: false,
                type: Boolean,
                default: false
            },
            currentAnimal: {
                required: false,
                type: Object
            }
        },
        data() {
            return {
                edit: undefined,
                form: form,
                url: '',
                species: [],
                noSpecies: false
                
            }
        },
        methods: {
            submit() {
                if (this.edit)
                    this.form
                        .put(this.url);
                else
                    this.form
                        .post(this.url)
                        .then(response => {
                            this.url = '/animal/' + response.slug;

                            this.form.species_id = response.species_id;
                            this.form.animal_id = response.animal_id;
                            this.form.name = response.name;
                            this.form.description = response.description;

                            this.form.noReset = ['animal_id', 'species_id', 'name', 'description'];

                            this.edit = true;

                            console.log("MESSAGE: ", this.form);
                            window.history.pushState("", "", this.url);
                        });
                
            }
        },
        created() {

            getSpecies()
                .then(species => {
                    this.species = species;
                })
                .catch(err => console.error(err));

            this.edit = this.isEditable;

            if (this.edit) {
                this.url = '/animal/' + this.currentAnimal.slug;

                this.form.animal_id = this.currentAnimal.animal_id;
                this.form.name = this.currentAnimal.name;
                this.form.description = this.currentAnimal.description;
                this.form.species_id = this.currentAnimal.species_id

                this.form.noReset = ['animal_id', 'name', 'description'];
            } else {
                this.url = '/animal';
            }
        },
        computed: {
            loading() {
                return !this.species.length
            }
        },

        watch: {
            species() {
                if (!this.loading && this.form.species_id === '') {
                    this.form.species_id = _.first(this.species).id;
                }
            }
        }
    }
</script>

<style scoped>

</style>
