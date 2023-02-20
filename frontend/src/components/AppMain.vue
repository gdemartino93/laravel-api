<template>

    <div>
      <h1 class="text-danger">Film</h1>
      <div v-if="error === false">
        
        <div v-for="(movie, index) in movies" :key="index">
            <Movie :movie="movie" />


              <form  method="POST" class="col-12 col-md-8 col-lg-4 mx-auto py-4">
   
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                    <input type="text" class="form-control" name="name" v-model="name">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Year</span>
                    <textarea  type="text-area" class="form-control" name="year" v-model="year" ></textarea>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">CashOut</span>
                    <input type="number" class="form-control" min="0" max="5" name="cashOut" v-model="cashOut">
                </div>
                <div class="input-group mb-3">
                    <select name="genre_id" class="form-select" id="floatingSelect" aria-label="Floating label select example" v-model="genre_id">
                        <option selected >Select genre:</option>
                        <option  >lista gener</option>
                    </select>
                </div>
                <div v-for="tag in tags">
                  <input type="checkbox" v-model="tag_id"   >
                  <label >{{ tag.name }}</label>
                </div>
                <button class="btn btn-success" type="submit">Add </button>
              </form>




























        </div>
        <div class="col-12 d-flex justify-content-center align-items-center my-3 gap-5">
            <!-- se è alla prima pagina nascondilo -->
            <a @click="prevPage()" :class="currentPage ===  1 ? 'd-none' : 'd-block'">
                <i class="fa-solid fa-hand-point-left"></i>
            </a>
            <!-- se è all'ultima pagina nascondilo -->
            <a @click="nextPage()" :class="currentPage + 1 > lastPage ? 'd-none' : 'd-block'">
                <i class="fa-regular fa-hand-point-right"></i>ù7a
            </a>
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
  import Movie from '../components/Movie.vue';
  import ErrorApi from '../components/ErrorApi.vue';

  // axios.defaults.baseURL  = "http://127.0.0.1:8000/api/v1/"
  
  export default {
    data() {
      return {
        // cambiare a true dopo debug
        isLoading: false, 
        url: "http://127.0.0.1:8000/api/v1/movies?page=",
        movies: [],
        error: false,
        fullPage: true,
        currentPage :1 ,
        lastPage : undefined,
        name : "",
        year : undefined,
        cashOut : undefined,
        tag_id : undefined,
        genre_id : undefined,
        tags : []
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
        axios.get(this.url + this.currentPage)
          .then(res => {
    
            this.movies = res.data.movies.data;
            this.error = false;
            this.isLoading = false;
            this.currentPage = res.data.movies.current_page;
            this.lastPage = res.data.movies.last_page
            console.log(this.lastPage);
            this.tags = res.data.tags;
            console.log(this.tags);
   
          })
          .catch(err => {
            console.log(err);
            this.error = true;
            this.isLoading = false;
          });
      },
      nextPage(){
        
        this.currentPage = this.currentPage + 1;
        // nuova chiamata Api con current page +1 
        this.fetchData();
      },
      prevPage(){
        
        this.currentPage = this.currentPage - 1;
        // nuova chiamata Api con current page -1 
        this.fetchData();
      },

      


    },
    mounted() {
      this.fetchData();

    }
  };
  </script>
  
  <style lang="scss" scoped>
  a{
    color: black;
  }
  i{
    font-size: 30px;
    color: cornflowerblue;
  }
  </style>
  