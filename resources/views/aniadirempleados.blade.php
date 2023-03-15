@extends('layouts.master')
@section('titulo','CRUD EMPLEADOS')
@section('contenido')
	
	<!-- INICIA VUE -->
	<div id="empleados">

	

 <div class="row">
 	<div class="col-md-8">
 		
 	</div>
 </div>
<!--tabla aniadir empleados-->
		<div class="row">
			<div class="col-md-12">
				<div class="card card-warning"> 
					<div class="card-header">
						<h3>CRUD EMPLEADOS
						<button type="button" class="btn btn-warning">	
						<span class="btn btn-sm btn-primary" @click="mostrarModal()">
							<i class="fa-solid fa-plus"></i>
						</span>
						</h3> 
						</button>

						<div class="col-md-6">
						<input type="text" placeholder="Escriba el nombre o cargo del personal" class="form-control" v-model="buscar">
						</div>
					</div>

					<div class="card-body">
						
							<!-- INICIO DE LA TABLA -->
				<table class="table table-bordered table-striped">
					<thead>
						<th hidden="">NUM EMPLEADO</th>
						<th>NOMBRE</th>
						<th>APELLIDO PATERNO</th>
						<th>APELLIDO MATERNO</th>
						<th>ACCIONES</th>

					</thead>

					<tbody>
						<tr v-for="empleados in filtroEmpleados">
							<td hidden="">@{{empleados.num_empleado}}</td>
							<td>@{{empleados.nombre}}</td>
							<td>@{{empleados.ap_p}}</td>
							<td>@{{empleados.ap_m}}</td>
							<td>
								<button class="btn btn-sm" @click="editandoEmpleado(empleados.num_empleado)">
									<i class="fas fa-pen"></i>
								</button>

								<button class="btn btn-sm" @click="eliminarEmpleado(empleados.num_empleado)">
									<i class="fas fa-trash"></i>
								</button>
							</td>
						</tr>
					</tbody>
				</table>
				<!-- FIN DE LA TABLA -->

					</div>
				
					
				</div>
			</div>  
			<!-- FIN DE COL-MD-12 -->
		</div>
<!--termina tabla
<!-- INICIA VENTANA MODAL -->
<div class="modal fade" id="modalEmpleados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">Agregar Empleado</h5>
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==false">Editar Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
      <div class="modal-body">
        
		<input type="text" class="form-control" placeholder="Nombre" v-model="nombre"><br>
		<input type="text" class="form-control" placeholder="Apellido Paterno" v-model="ap_p"><br>
		<input type="text" class="form-control" placeholder="Apellido Materno" v-model="ap_m"><br>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="guardarEmpleado" v-if="agregando==true">Guardar</button>
        <button type="button" class="btn btn-primary" @click="actualizarEmpleado()" v-if="agregando==false">Guardar</button>
      </div>
	  </form>
    </div>
  </div>
</div>
<!-- FIN MODAL -->

	</div>
	<!-- TERMINA VUE -->

	
@endsection

@push('scripts')
	<script type="text/javascript" src="js/vue-resource.js"></script>
	<script type="text/javascript" src="js/apis/apiEmpleado.js"></script>
	<script src="js/vue.js"></script>
@endpush

<input type="hidden" name="route" value="{{url('/')}}">