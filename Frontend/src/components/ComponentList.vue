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
            <tr v-for="employee in paginateData" :key="employee.id">
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
        <!-- pagination-->
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item" v-on:click="previusPage()"><a class="page-link" href="#">Atras</a></li>
            <li v-for="(page,index) in allPages()" :key="index" v-on:click="getDataPage(page)" class="page-item"><a class="page-link" href="#">{{ page }}</a></li>
            <li class="page-item" v-on:click="nextPage()"><a class="page-link" href="#">Siguiente</a></li>
          </ul>
        </nav>
        <!--end pagination-->
      </div>
      
    </div>
  </div>
</template>

<script>
export default {
  data(){
      return{
        employees:[],
        elements:10,
        paginateData:[],
        actualPage:1
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
            this.getDataPage(1);
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
            let result = Object.values(responseData); // valores = ["Scott", "Negro", true, 5];
            
              alert(result[1]);
              window.location.href='/'
            
      
          })
          .catch(console.log())
          }
      },

      //pagination
      allPages(){
        return Math.ceil(this.employees.length/this.elements);
      },
      getDataPage(numPage){
        this.paginateData=[];
        let start=(numPage * this.elements) - this.elements;
        let end=(numPage * this.elements);

        this.paginateData = this.employees.slice(start,end);
      },
      previusPage(){
        if(this.actualPage > 1){
          this.actualPage--;
        }
        this.getDataPage(this.actualPage);
      },
      nextPage(){
        if(this.actualPage < this.allPages()){
          this.actualPage++;
        }
        this,this.getDataPage(this.actualPage);
      }
    }
}
</script>

<style>

</style>