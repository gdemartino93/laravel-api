<template>
    
    <article class="myItem d-flex flex-column col-md-6 col-lg-8">
         <h3 class="fw-bold">{{ movie.name }}</h3>  
         <div>
             <span class="fw-bold text-info">Date:</span>
             <span>{{ movie.date }}</span>
         </div>
         <div>
             <span class="fw-bold text-info">Cashout:</span>
             <span>{{ movie.cashOut }} &euro;</span>
         </div>
         <div>
             <span class="fw-bold text-info">Genre:</span>
             <span>{{ movie.genre.name }}</span>
         </div>
         <div>
             <span class="fw-bold text-info">Tags:</span>
             <ul>
                <li v-for="tagMovie in movie.tag">
                    {{tagMovie.name}}
                </li>
            </ul>
         </div>
         <div class="d-flex gap-2 align-items-center">
            <a :href="'http://127.0.0.1:8000/movies/delete/' + movie.id">
                 <i class="fa-regular fa-square-minus text-danger"></i>
             </a>
             <a :href="'http://127.0.0.1:8000/movies/edit/' + movie.id">
                 <i class="fa-solid fa-pen-to-square text-warning"></i>
             </a>
         </div>
    </article> 
</template>

<script>
    export default {
      
        props : {
            movie : Object
        }
    }
</script>

<style>
span{
    color: white;
}
h3{
    color: white;
}
li{
    color: white;
    font-weight: bold;
    list-style: circle;
}
</style>