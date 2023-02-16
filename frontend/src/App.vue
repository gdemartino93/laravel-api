<script >
import AppHeader from './components/AppHeader.vue'

export default{
  components :{ AppHeader} ,
  data(){
    return{
      title : "My Minimal Shop"
    }
  }
}
</script>

<template>
  <header>
    <AppHeader :title="title" />
  </header>
  <main>
    
  </main>

</template>

<style >



</style>
