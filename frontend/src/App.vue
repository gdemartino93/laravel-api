<script >
import AppHeader from './components/AppHeader.vue';
import AppMain from './components/AppMain.vue';


export default{
  components :{ AppHeader , AppMain} ,
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
    <AppMain />
    zxc
  </main>

</template>

<style >



</style>
