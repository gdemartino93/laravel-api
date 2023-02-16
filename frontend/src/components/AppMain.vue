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
        this.isLoading = true;
        axios.get(this.url)
          .then(res => {
            this.movies = res.data.response;
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
    }
  };
  </script>
  
  <style lang="scss" scoped>
  </style>
  