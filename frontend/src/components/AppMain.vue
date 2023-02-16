<template>
    <div>
      <h1 class="text-danger">Film</h1>
      <div v-if="error === false">
        <div v-for="(movie, index) in movies" :key="index">
            <Movie :movie="movie" />
        </div>
      </div>
      <div v-else>
        <ErrorApi />
      </div>
      <Loading :active="isLoading" :can-cancel="true" :on-cancel="onCancel" :is-full-page="fullPage" />
    </div>
  </template>
  
  <script>
  import Loading from 'vue-loading-overlay';
  import 'vue-loading-overlay/dist/css/index.css';
  import axios from 'axios';
  import Movie from '../components/Movie.vue'
  import ErrorApi from '../components/ErrorApi.vue'
  
  export default {
    data() {
      return {
        // cambiare a true dopo debug
        isLoading: false, 
        url: "http://127.0.0.1:8000/api/v1/movies",
        movies: [],
        error: false,
        fullPage: true
      };
    },
    components: {
      Movie,
      ErrorApi,
      Loading
    },
    methods: {
      fetchData() {
        // cambiare a true dopo debug
        this.isLoading = false;
        axios.get(this.url)
          .then(res => {
            console.log(res.data.response.data);
            this.movies = res.data.response.data;
            this.error = false;
            this.isLoading = false;
          })
          .catch(err => {
            console.log(err);
            this.error = true;
            this.isLoading = false;
          });
      },
    },
    mounted() {
      this.fetchData();
      console.log(this.movies.data);
    }
  };
  </script>
  
  <style lang="scss" scoped>
  </style>
  