<template>
    <form method="POST" @submit.prevent="getWeatherForecast" class="form-group">
        <input v-model="form.searchString" type="text" class="form-control">
        <button type="submit">Submit</button>
    </form>
</template>

<script>
export default {
    data() {
        return {
            form: {
                searchString: ''
            }
        }
    },

    methods: {
        getWeatherForecast() {
            axios.post("/", this.form.searchString).then(response => {
                console.log(response);
            }).catch(error => {
                this.errors = error.response
            });
        },
    }
}
</script>
