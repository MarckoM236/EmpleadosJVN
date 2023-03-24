<template>
  <nav class="navbar navbar-expand navbar-light bg-light">
      <div class="nav navbar-nav">
        <router-link class="nav-link" to="/create">Crear</router-link> 
        <router-link class="nav-link" to="/">Empleados</router-link> 
      </div>
  </nav>
  <br>
  <router-view/>
</template>

<script>


export default {
  
}
</script>

<style>

</style>
