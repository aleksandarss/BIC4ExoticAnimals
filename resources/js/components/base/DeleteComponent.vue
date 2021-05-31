<template>
    <div class="modal" :class="active ? 'is-active' : ''">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">{{ title }}</p>
                <button class="delete" aria-label="close" @click="closeModal({id: 0})"></button>
            </header>
            <section class="modal-card-body">
                {{ content }}
            </section>
            <footer class="modal-card-foot">
                <button class="button is-danger" @click="callDeleteLink">Delete</button>
                <button class="button" @click="closeModal({id: 0})">Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        name: "DeleteModalComponent",
        props: {
            title: {
                required: true,
                type: String
            },
            content: {
                required: true,
                type: String
            },
            active: {
                required: true,
                type: Boolean
            },
            deleteUrl: {
                required: true,
                type: String
            },
            entryId: {
                required: true,
                type: Number
            }
        },
        methods: {
            closeModal(message) {
                this.$emit('close-modal', message);
            },
            callDeleteLink() {
                axios.delete(this.deleteUrl)
                    .then(response => this.closeModal({
                            id: this.entryId,
                            message: response.data.message
                        }));
            }
        }
    }
</script>

<style scoped>
</style>