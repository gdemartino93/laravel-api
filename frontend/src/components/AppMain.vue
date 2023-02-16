<template>
    <div v-if="error == false">
        <h1 class="text-danger">Film</h1>
        <div v-for="(movie,index) in movies" :key="index">
        <Movie :movie="movie"  />
        </div>
    </div>
    <div v-else>
        <ErrorApi />

    </div>


</template>

<script>
import axios from 'axios';
import Movie from '../components/Movie.vue'
import ErrorApi from '../components/ErrorApi.vue'


    export default {
    data() {
        return {

            url: "http://127.0.0.1:8000/api/v1/movies",
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
                .then(res => (this.movies = res.data.response),
                        this.error = false)
                .catch(err => {
                    console.log(err);
                    // ho dichiarato questa variabile perchè essendo una promise non posso usare direttamente il this
                    let error = this.error;
                    this.error = true;
                }

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