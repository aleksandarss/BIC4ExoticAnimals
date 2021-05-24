<template>
    <div class="box">
        <query-message :fail="false" :success="true" :message="message"></query-message>
    </div>
</template>

<script>
    import QueryMessage from "./QueryMessage";

    export default {
        name: "SuccessBoxComponent",
        props:{
            message: {
                type: String,
                required: true
            }
        },
        components: {
            QueryMessage
        }
    }
</script>

<style scoped>

</style>
