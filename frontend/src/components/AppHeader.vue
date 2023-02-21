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

        <a href="">
            <i class="fa-solid fa-house fs-2"></i>
        </a>
    </div>
    <div class="col-8">
        <a href="">
            <h1>{{title}}</h1>
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
