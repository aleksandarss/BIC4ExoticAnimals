<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="column">
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
                <div class="box custom-box">
                    <animals-list :animals="animals" v-on:open-modal="setModal"></animals-list>
                </div>
            </div>
        </div>
        <delete-modal :title="modalTitle" :delete-url="modalUrl" :active="modalActive" :content="modalContent"
                      :entry-id="modalId" v-on:close-modal="toggleModal"></delete-modal>
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
            AnimalsList,
            ErrorBox,
            SuccessBox,
            DeleteModal
        },
        name: "AnimalsComponent",
        data() {
            return {
                animals: [],
                modalActive: false,
                modalTitle: '',
                modalContent: '',
                modalUrl: '',
                modalId: 0,
                successMessage: ''
            }
        },
        created() {
            getAnimals()
                .then(animals => {
                    this.animals = animals;
                })
                .catch(err => console.error(err));
        },
        methods: {
            toggleModal (info) {
                this.modalActive = !this.modalActive;

                if (info.id !== 0) {
                    this.animals = _.remove(this.animals, anim => anim.id !== info.id);
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
        }
    }

</script>
