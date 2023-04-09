<!--inicia plantilla limpia-->
@extends('layouts.master')
@section('titulo','Alumno')
@section('contenido')
<div id="grupos">

<div class="row">
				<div class="col-xl-12">
				<div class="col-md-12">
					<div class="card card-warning"> 
						<div class="card-header">
							<h3>ALUMNOS</h3>
								<li class="nav-item d-none d-lg-flex">
									
									<span class="btn btn-primary" @click="mostrarModal()">+ Crear nuevo</span>
									<button class="btn btn-success" @click="MostrarModalProducto()" type="button" >Grupo</button>
									<button class="btn btn-info" @click="MostrarModalTipo()" type="button" >añadir tipos</button>
								</li>
							<div class="col-md-6">
							<input type="text" placeholder="Escriba el nombre del producto" class="form-control" v-model="buscar">
							</div>
						</div>

						<div class="card-body">
							
								<!-- INICIO DE LA TABLA -->
					<table class="table table-bordered table-striped" >
						<thead>
							<th style="background: #FFFF00">ID SKU</th>
							<th style="background: #FFFF00">GRUPO</th>
							<th style="background: #FFFF00">ACCIONES</th>

						</thead>

						<tbody >
							<tr v-for="grupo in filtroGrupo">
                            <td>@{{grupo.id_grupo}}</td>
								<td>@{{grupo.grupo}}</td>
								<!--<td><img v-bind:src=producto.foto width="50" height="60"></td>-->
								<!--<td ><img href="prods/@{{producto.foto}}" alt=""></td>-->
			

								<td>
									<button class="btn btn-sm" @click="editandoGrupo(grupo.id_grupo)">
										<i class="fas fa-pen"></i>
									</button>

									<button class="btn btn-sm" @click="eliminarGrupo(grupo.id_grupo)">
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
				
			</div><!--fin de row-->
            <!--EL id es el nombre con el que se va a hablar la ventana modal-->
<div class="modal fade" id="modalGrupo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true" >añadir grupo</h5>
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==false" >editar grupo</h5>
        <button type="button" class="close" @click="modalGrupo()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form>
        	<!--AQUI VA EL CONTENIDO-->
            <h1>GRUPO</h1>
            <input type="text"  class="form-control" placeholder="Nombre del grupo" v-model="grupo"><br>
        	<!--AQUI TERMINA EL CONTENIDO-->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" @click="modalGrupo()">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="guardarGrupo()" v-if="agregando==true" >Guardar</button>
        <button type="button" class="btn btn-primary" @click="actualizarGrupo()" v-if="agregando==false" >Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- aqui termina el modal-->
</div>
@endsection

@push('scripts')
    <script type="text/javascript" src="js/vue-resource.js"></script>
	<script type="text/javascript" src="js/apis/apiGrupo.js"></script>
	<script src="js/vue.js"></script>
	
@endpush

<input type="hidden" name="route" value="{{url('/')}}">
<!--termina plantilla limplia-->