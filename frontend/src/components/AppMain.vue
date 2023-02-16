<template>
    <div>
        <h1 class="text-danger">Film</h1>
        <div v-for="(movie,index) in movies" :key="index">
        <Movie :movie="movie"  />
        <!-- <span>{{ movie.name }}</span> -->
        </div>
    </div>


</template>

<script>
import axios from 'axios';
import Movie from '../components/Movie.vue'


    export default {
    data() {
        return {

            url: "http://127.0.0.1:8000/api/v1/movies",
            movies: [],
            success: undefined,
        };

    },
    components : {
        Movie
    },  
    methods: {
        fetchData() {
            axios.get(this.url)
                .then(res => (this.movies = res.data.response))
                .catch(err => console.log(err));
        },
    },
    mounted() {
        this.fetchData();
    },

}
</script>

<style lang="scss" scoped>

</style>