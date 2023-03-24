<template>
  <div class="container">

        <div class="card">

            <div class="card-header">
            Agregar Nuevo Empleado
            </div>

            <div class="card-body">
                <form v-on:submit.prevent="insertEmployee">
                    <div class="form-group">
                        <label for="">Primer Nombre</label>
                        <input type="text"
                            class="form-control" required name="firtsName" v-model="employee.firtsName" id="firtsName" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">Escriba el nombre del empleado</small>
                    </div>

                    <div class="form-group">
                        <label for="">Otro Nombre</label>
                        <input type="text"
                            class="form-control" name="otherName" v-model="employee.otherName" id="otherName" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">Escriba el otro nombre del empleado</small>
                    </div>

                    <div class="form-group">
                        <label for="">Primer Apellido</label>
                        <input type="text"
                            class="form-control" required name="firtsLastName" v-model="employee.firtsLastName" id="firtsLastName" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">Escriba el apellido del empleado</small>
                    </div>

                    <div class="form-group">
                        <label for="">Pais</label>
                        <select class="form-control" name="country" v-model="employee.country" required>
                            <option value="COLOMBIA" selected>COLOMBIA</option>
                            <option value="ESTADOS UNIDOS">ESTADOS UNIDOS</option>
                        </select>
                        <small id="helpId" class="form-text text-muted">Seleccione el pais del empleado</small>
                    </div>
                    <br>
                    <div class="btn-group" role="group" aria-label="">
                        <button type="submit" class="btn btn-success">Agregar</button>
                        <button v-on:click="cancelar" type="button" class="btn btn-danger">Cancelar</button>
                    </div>

                </form>

            </div>

        </div>


    </div>

</template>

<script>
export default {
    data(){
      return{
        employee:{}
      }
    },
    methods:{
      insertEmployee(){
        
        console.log(this.employee);
        var data={firtsName:this.employee.firtsName,otherName:this.employee.otherName,firtsLastName:this.employee.firtsLastName,country:this.employee.country}
        fetch('http://localhost/Emp_JVN/Backend/public/api/employee',{
          method:"POST",
          headers: {
            "Content-Type": "application/json"
          },
          body:JSON.stringify(data)
        })
        .then(response=>response.json())
        .then((responseData =>{
          console.log(responseData);
          window.location.href='/'
        }))
      },
      cancelar(){
        window.location.href='/'
      }
    }
}
</script>

<style>

</style>