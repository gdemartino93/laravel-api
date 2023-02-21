<script >
import axios from 'axios';

axios.defaults.baseURL ="http://127.0.0.1:8000/api/v1/movie/"

const emptyNewMovie = {
  tags_id : []
};
export default{
  data(){
    return{
      movies : [],
      tags : [],
      genres : [],
      // nuovo oggetto creato dal form
      new_movie : emptyNewMovie,
      // gestione form visibile
      isVisible : false
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
            const success = data.success;
            if (success){
              this.getMovie()            
            }
        
          })
          .catch(err => console.log(err))
    },
    showForm(e){
      e.preventDefault()
      this.isVisible = !this.isVisible
    },  
    submitMovie(e){
      e.preventDefault();
       
    }
  },
  mounted(){
    this.getMovie();
  }
}

</script>

<template>
        <a href="" @click="showForm">
            <i class="fa-solid fa-plus fs-2"></i>
        </a>
      <form v-if="isVisible === true" action="" method="POST" class="d-flex flex-column col-4 mx-auto">
    <label for="name">Name</label>
    <input type="text" name="name" id="" v-model="new_movie.name">
    <label for="year">Year</label>
    <input type="number" id="" v-model="new_movie.year">
    <label for="cashout">CashOut</label>
    <input type="number" name="cashout" id="" v-model="new_movie.cashout">
    <br>
    <label for="genre_id">Genre:</label>
    <br>
    <select name="genre_id" class="my-3" v-model="new_movie.genre">
      <option v-for="genre in genres" :value="genre.id" key="genre.id"  >{{ genre.name }}</option>
    </select>
    <span>TAG:</span>
      <br>
    <div v-for="tag in tags" key="tag.id">
      <input type="checkbox" name="" :id="tag.id" :value="tag.id" v-model="new_movie.tags_id">
      <label for="{{ tag.id }}">{{ tag.name }}</label>
    </div> 
    <div>
      <button class="btn btn-success my-3" type="submit">Add</button>
    </div>
  </form>
  
  <h1 class="text-success">Movies:</h1>
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
.myItem{
  color: white;
}
#genres{
  color: black;
}
form{
  color: white;
}
</style>