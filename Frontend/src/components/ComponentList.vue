<template>
  <div class="container">
    <router-link class="btn btn-success" to="/create">Agregar Nuevo Empleado</router-link> 

    <br><br>

    <div class="card">
      <div class="card-header">
        Empleados
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>Primer Nombre</th>
              <th>Otro nombre</th>
              <th>Primer Apellido</th>
              <th>Correo Electronico</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="employee in employees" :key="employee.id">
              <td>{{ employee.firtsName }}</td>
              <td>{{ employee.otherName }}</td>
              <td>{{ employee.firtsLastName }}</td>
              <td>{{ employee.email }}</td>
              <td>
                
                <button type="button" class="btn btn-danger" v-on:click="employeeDelete(employee.id)">Eliminar</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
</template>

<script>
export default {
  data(){
      return{
        employees:[]
      }
    },
    created:function(){
      this.consultEmployees();
    },
    methods:{
      consultEmployees(){
        fetch('http://localhost/Emp_JVN/Backend/public/api/employee')
        .then(response=>response.json())
        .then((responseData)=>{
          //console.log(datosRespuesta)
          this.empoyees=[]
          if(typeof responseData[0].success==='undefined'){
            this.employees=responseData;
          }
        })
        .catch(console.log())
      },
      employeeDelete(id){
        
        if(confirm('¿Realmente desea eliminar el empleado?')){
          fetch('http://localhost/Emp_JVN/Backend/public/api/employee/'+id,{method:'DELETE'})
          .then(response=>response.json())
          .then((responseData)=>{
            console.log(responseData)
            window.location.href='/'
          })
          .catch(console.log())
          }
      }
    }
}
</script>

<style>

</style>