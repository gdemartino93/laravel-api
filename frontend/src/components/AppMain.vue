<script >
import axios from 'axios';

axios.defaults.baseURL ="http://127.0.0.1:8000/api/v1/movie/"
export default{
  data(){
    return{
      movies : [],
      tags : [],
      genres : []
    }
  },
  methods : {
    getMovie(){
      axios.get('all')
          .then(res => {
            const data = res.data;
            const success = res.success;
            this.movies = data.movies;
            this.tags = data.tags;
            this.genres = data.genres;

            if(success){
              this.movies = this.movies;
              this.tags = this.tags;
              this.genres = this.genres;
            }
          })
    },
    deleteMovie(movie){
      axios.delete('delete/' + movie.id)
          .then(res => {
            const data = res.data;
            const success = res.success;
            
            this.getMovie()            
          })
          .catch(err => console.log(err))
    }
  },
  mounted(){
    this.getMovie();
  }
}

</script>

<template>
  <h1>Movies:</h1>
  <div v-for="movie in movies" class="d-flex flex-column col-6 myItem" :key="movie.id">
    <h4 >Name: {{ movie.name }}</h4>
    <span>Date: {{ movie.date }}</span>
    <span>Cashout: {{ movie.cashOut }} &euro;</span>
    <span @click="deleteMovie(movie)">
      <i class="fa-solid fa-trash"></i>
    </span>
  </div>
  
</template>



<style lang="scss" scoped>
*{
  color: white;
}
</style>