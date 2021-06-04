<template>
    <div class="container">
        <!-- Head -->
        <section class="hero">
            <div class="hero-body">
                <div class="container has-text-centered">
                <div class="hero-body"> 
                    <p class="customFontColor title is-size-1">Register a new animal!</p>
                </div>
                <h2 class="subtitle">Here you can register a new animal to the system.</h2>
                </div>
            </div>
        </section>
        
        <div class="columns is-multiline">
            <div class="card blog-card column is-half is-offset-one-quarter has-background-dark">
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
                                <label class="label has-text-white has-text-centered" for="name">Name</label>
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
                                <label class="label has-text-white has-text-centered" for="description">Description</label>
                                <div class="control">
                                    <textarea id="description" v-model="form.description" class="textarea"></textarea>
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('description')"
                                   v-text="form.errors.get('description')"/>
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
        'description': ''
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
                species: []
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

                this.form.noReset = ['animal_id', 'name', 'description'];
            } else {
                this.url = '/animal';
            }
        }
    }
</script>

<style scoped>

</style>
