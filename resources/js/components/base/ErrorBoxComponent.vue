<template>
    <div class="box">
        <query-message :fail="true" :success="false" :message="message"></query-message>
    </div>
</template>

<script>
    import QueryMessage from "./QueryMessage";

    export default {
        name: "ErrorBoxComponent",
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
