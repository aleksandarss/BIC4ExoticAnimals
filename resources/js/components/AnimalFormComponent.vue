<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="card animal-card column is-half is-offset-one-quarter">
                <header class="card-header">
                    <h1 class="card-header-title is-centered" v-text="edit ? form.title : 'New animal'"/>
                </header>
                <div class="card-content">
                    <div class="content">
                        <query-message :success="form.isSuccess()" :fail="form.isFail()"
                                       :message="form.failMessage || form.successMessage"></query-message>
                        <form @submit.prevent="submit">
                            <div class="field" v-if="!edit">
                                <label class="label" for="name">Name</label>
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
                                <label class="label" for="species">Species</label>
                                <div class="control">
                                    <div class="select is-fullwidth" :class="loading ? 'is-loading' : ''">
                                        <select id="category" :disabled="loading" v-model="form.category_id">
                                            <option v-if="loading" :value="this.form.category_id"> Loading...</option>
                                            <option v-for="cat in categories" v-if="!loading" v-text="cat.name"
                                                    :value="cat.id"/>
                                        </select>
                                    </div>
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('category_id')"
                                   v-text="form.errors.get('category_id')"/>
                                <p v-if="noCategories" class="help is-warning">Add some categories to create animals!</p>
                            </div>

                            <div class="field">
                                <label class="label" for="body">Body</label>
                                <div class="control">
                                    <textarea id="body" v-model="form.body" class="textarea"></textarea>
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('body')"
                                   v-text="form.errors.get('body')"/>
                                <p class="help">
                                    You can use <a target="_blank"
                                                   href="https://daringfireball.net/projects/markdown/syntax">
                                    Markdown</a> syntax here.
                                </p>
                            </div>

                            <button type="submit" class="button is-large is-primary is-outlined is-fullwidth"
                                    v-text="edit ? 'Save' : 'Post'" :disabled="loading"/>
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
        'name': '',
        'description': '',
        'species_id': '',
        'noReset': ['species_id']
    });

    export default {
        name: "AnimalFormComponent",
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
                categories: [],
                noCategories: false
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
                        .then((response) => {
                            this.url = '/animal/' + response.slug;

                            this.form.animal_id = response.animal_id;
                            this.form.name = response.name;
                            this.form.description = response.description;
                            this.form.species_id = response.species_id;

                            this.form.noReset = ['animal_id', 'name', 'description', 'species_id'];

                            this.edit = true;

                            window.history.pushState("", "", this.url);
                        });
            }
        },
        created() {
            axios.get('/list/species')
                .then(response => {
                    this.species = response.data;

                    if (this.loading)
                        this.noCategories = true;
                });

            this.edit = this.isEditable;

            if (this.edit) {
                this.url = '/animal/' + this.currentAnimal.slug;
                this.form.animal_id = this.currentAnimal.id;
                this.form.name = this.currentAnimal.name;
                this.form.description = this.currentAnimal.description;
                this.form.species_id = this.currentAnimal.species_id;

                this.form.noReset = ['animal_id', 'name', 'description', 'species_id'];
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
