<script >
export default {
    props: {
        title : String
    },
    data(){
        return{
            
        }
    },
  components: {

  }
}
</script>
<template>
 <div class="text-center text-info col-12 d-flex align-items-center">
    <div class="col-2">
        <a href="http://127.0.0.1:8000/movies/create">
            <i class="fa-solid fa-plus fs-2"></i>
        </a>
        <a href="http://localhost:5174/">
            <i class="fa-solid fa-house fs-2"></i>
        </a>
    </div>
    <div class="col-8">
        <a href="http://localhost:5174/">
            <h1>My minimal Shop</h1>
        </a>
    </div>
    <div class="col-2">
       All Movies
    </div>
  
 </div>
</template>


<style scoped>
a{
    text-decoration: none;
}
a:hover{
    color: inherit;
}
</style>
