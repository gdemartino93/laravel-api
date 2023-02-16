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
         <div class="d-flex gap-2 align-items-center">
             <a href="">
                 <i class="fa-regular fa-square-minus text-danger"></i>
             </a>
             <a href="">
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
</style>