<template>
    <div v-if="error == false">
        <h1 class="text-danger">Film</h1>
        <div v-for="(movie,index) in movies" :key="index">
        <Movie :movie="movie"  />
        </div>
    </div>
    <ErrorApi v-else />


</template>

<script>
import axios from 'axios';
import Movie from '../components/Movie.vue'
import ErrorApi from '../components/ErrorApi.vue'


    export default {
    data() {
        return {

            url: "http://127.0.0.1:1/movies",
            movies: [],
            success: undefined,
            error : false
        };

    },
    components : {
        Movie,
        ErrorApi
    },  
    methods: {
        fetchData() {
            axios.get(this.url)
                .then(res => (this.movies = res.data.response))
                .catch(err => console.log(err),
                        this.error = true

                );
        },
    },
    mounted() {
        this.fetchData();
    },

}
</script>

<style lang="scss" scoped>

</style>