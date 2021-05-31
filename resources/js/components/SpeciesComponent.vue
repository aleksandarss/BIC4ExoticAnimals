<template>
    <div class="container">
        <hero main-title="Species"></hero>
        <div class="columns is-multiline">
            <div class="column is-three-fifths is-offset-one-fifth">
                <success-box :message="successMessage" v-if="showSuccessMessage"></success-box>
                <div class="box custom-box" v-if="hasSpecies">
                    <species-list :species="species" v-on:open-modal="setModal"></species-list>
                </div>
                <error-box message="No species found" v-if="!hasSpecies"></error-box>
            </div>
        </div>
        <delete-modal :title="modalTitle" :delete-url="modalUrl" :active="modalActive" :content="modalContent"
                      :entry-id="modalId" v-on:close-modal="toggleModal"></delete-modal>
    </div>
</template>

<script>
    import SpeciesList from './SpeciesListComponent';

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
        components:{
            SpeciesList,
            ErrorBox,
            SuccessBox,
            DeleteModal
        },
        name: "SpeciesComponent",
        data() {
            return {
                species: [],
                modalActive: false,
                modalTitle: '',
                modalContent: '',
                modalUrl: '',
                modalId: 0,
                successMessage: ''
            }
        },
        methods: {
            toggleModal (info) {
                this.modalActive = !this.modalActive;

                if (info.id !== 0) {
                    this.species = _.remove(this.species, cat => cat.id !== info.id);
                    this.successMessage = info.message;
                }
            },
            setModal (data) {
                this.modalId = data.id;
                this.modalTitle = data.title;
                this.modalContent = data.content;
                this.modalUrl = data.url;
                this.toggleModal({id: 0});
            }
        },
        created() {
            getSpecies()
                .then(species => {
                    this.species = species;
                })
                .catch(err => console.error(err));
            console.log("SPECIES ARE: ", this.species);
        },
        computed: {
            hasSpecies() {
                return !!this.species.length;
            },
            showSuccessMessage() {
                return this.successMessage !== '';
            }
        }

    }
</script>

<style scoped>

</style>
