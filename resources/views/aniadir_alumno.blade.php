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

              <h1 hidden="">@{{matricula1}}</h1>
              <h1 hidden="">@{{obtenerSiguienteNumero}}</h1>
								<li class="nav-item d-none d-lg-flex">
									
									<span class="btn btn-primary" @click="mostrarModalAlumno()" hidden="">+ Crear nuevo</span>
									<button class="btn btn-success" @click="MostrarModalGrupo()" type="button" hidden >Grupo</button>
									<button class="btn btn-info" @click="MostrarModalCarrera()" type="button" hidden>Carrera</button>
								</li>
							<div class="col-md-6">
							<input type="text" placeholder="Escriba el nombre del alumno" class="form-control" v-model="buscar2">
							</div>
						</div>

						<div class="card-body">
							                      <!-- INICIO DE LA TABLA -->
                                 <table class="table table-bordered table-striped" >
                                    <thead>
                                        <th style="background: #FFFF00">MATRICULA</th>
                                        <th style="background: #FFFF00">NOMBRE</th>
                                        <th style="background: #FFFF00">AP_P</th>
                                        <th style="background: #FFFF00">AP_M</th>
                                        <th style="background: #FFFF00">CURP</th>
                                        <th style="background: #FFFF00">NNS</th>
                                        <th style="background: #FFFF00">LOCALIDAD</th>
                                        <th style="background: #FFFF00">C.INTERIOR</th>
                                        <th style="background: #FFFF00">C.EXTERIOR</th>
                                        <th style="background: #FFFF00">CARRERA</th>
                                        <th style="background: #FFFF00" hidden="">SALON</th>
                                        <th style="background: #FFFF00">ACCIONES</th>

                                    </thead>

                                    <tbody >
                                        <tr v-for="alumno in filtroAlumno">
                                            <td>@{{alumno.id_matricula}}</td>
                                            <td>@{{alumno.nombre}}</td>
                                            <td>@{{alumno.ap_p}}</td>                                        
                                            <td>@{{alumno.ap_m}}</td> 
                                            <td>@{{alumno.curp}}</td>
                                            <td>@{{alumno.nns}}</td>                                       
                                            <td>@{{alumno.localidad}}</td>
                                            <td>@{{alumno.calle_int}}</td>
                                            <td>@{{alumno.calle_ex}}</td>
                                            <td>@{{alumno.carreras.carrera}}</td>
                                            <!--<td>@{{alumno.id_salon}}</td>-->

                                            <!--<td><img v-bind:src=producto.foto width="50" height="60"></td>-->
                                            <!--<td ><img href="prods/@{{producto.foto}}" alt=""></td>-->
                        

                                            <td>
                                                <!--.prevent elimina el el comportamiento
                                                predeterminado de la acción de clic
                                                y se ejecutará el método tal cual-->
                                                <button class="btn btn-sm" @click.prevent="editandoAlumno(alumno.id_matricula)">
                                                    <i class="fas fa-pen"></i>
                                                </button>

                                                <button class="btn btn-sm" @click.prevent="eliminarAlumno(alumno.id_matricula)">
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
    <!--AQUI EMPIEZA PLANTILLA MODAL LIMPIO-->
<!--EL id es el nombre con el que se va a hablar la ventana modal-->
<div class="modal fade" id="modalAlumno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">AGREGANDO ALUMNO</h5>
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==false">EDITANDO ALUMNO</h5>
        <button type="button" class="close" @click="cerrarModalAlumno()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form>
        	<!--AQUI VA EL CONTENIDO-->
          <h6>Matricula</h6>
          <input type="text" class="form-control" placeholder="Matricula" v-model="matricula" readonly>
          <h6>Nombre</h6>
          <input type="text" class="form-control" placeholder="Nombre" v-model="nombre">
          <h6>Apellido Paterno</h6>
          <input type="text" class="form-control" placeholder="Apellido Paterno" v-model="ap_p">
          <h6>Apellido Materno</h6>
          <input type="text" class="form-control" placeholder="Apellido Materno" v-model="ap_m">
          <h6>Curp</h6>
          <input type="text" class="form-control" placeholder="Curp" v-model="curp">
          <h6>NNS</h6>
          <input type="text" class="form-control" placeholder="Numero de Seguridad Social" v-model="nns">
          <h6>Localidad</h6>
          <input type="text" class="form-control" placeholder="Localidad" v-model="localidad">
          <h6>Calle Interior</h6>
          <input type="text" class="form-control" placeholder="Calle interior" v-model="calle_int">
          <h6>Calle Exterior</h6>
          <input type="text" class="form-control" placeholder="Calle Exterior" v-model="calle_ex">
          <!--<input type="text" class="form-control" placeholder="Salon" v-model="id_salon">-->
          <!--<input type="text" class="form-control" placeholder="Carrera" v-model="id_car">-->
          <h6>Elija una carrera</h6>
          <select name="carrera" v-model="id_car" class="form-control" aria-placeholder="Elije la carrera">
          <option v-for="carrera in filtroCarrera" v-bind:value="carrera.id"><td>@{{carrera.carrera}}</td></option>
          </select>
      
        	
        	<!--AQUI TERMINA EL CONTENIDO-->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" @click="cerrarModalAlumno()">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="guardarAlumno()" v-if="agregando==true">Guardar</button>
        <button type="button" class="btn btn-primary" @click="actualizarAlumno()" v-if="agregando==false">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- aqui termina el modal-->
           
<!-- AQUI EMPIEZA MODAL GRUPO-->
<!--EL id es el nombre con el que se va a hablar la ventana modal-->
<div class="modal fade" id="MostrarModalGrupo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal</h5>
        <button type="button" class="close" @click="CerrarModalGrupo()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form>
        	<!--AQUI VA EL CONTENIDO-->
            <div class="row">
              <div class="col-xl-12">
                        <div class="col-md-12">
                            <div class="card card-warning"> 
                                <div class="card-header">
                                    <h3>ALUMNOS</h3>
                                        <li class="nav-item d-none d-lg-flex">
                                            
                                            <span class="btn btn-primary" @click="mostrarModal()">+ Crear nuevo</span>
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
                                                    <button class="btn btn-sm" @click.prevent="editandoGrupo(grupo.id_grupo)">
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

                                </div><!--div.card.body-->
                            
                                
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

        	
        	<!--AQUI TERMINA EL CONTENIDO-->
        </form>
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" @click="CerrarModalGrupo()">Cerrar</button>-->
        <button type="button" class="btn btn-primary" @click="CerrarModalGrupo()">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!--AQUI TERMINA MODAL GRUPO-->

<!--AQUI EMPIEZA MODAL CARRERA-->
<!--EL id es el nombre con el que se va a hablar la ventana modal-->
<div class="modal fade" id="MostrarModalCarrera" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal</h5>
        <button type="button" class="close"@click="CerrarModalCarrera()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form>
        	<!--AQUI VA EL CONTENIDO-->
          <div class="row">
              <div class="col-xl-12">
                        <div class="col-md-12">
                            <div class="card card-warning"> 
                                <div class="card-header">
                                    <h3>Carrera</h3>
                                        <li class="nav-item d-none d-lg-flex">
                                            
                                            <span class="btn btn-primary" @click="mostrarModalCarrera()">+ Crear nuevo</span>
                                        </li>
                                    <div class="col-md-6">
                                    <input type="text" placeholder="Escriba el nombre del producto" class="form-control" v-model="buscar3">
                                    </div>
                                </div>

                                <div class="card-body">
                                    
                                            <!-- INICIO DE LA TABLA -->
                                    <table class="table table-bordered table-striped" >
                                        <thead>
                                            <th style="background: #FFFF00">ID</th>
                                            <th style="background: #FFFF00">GRUPO</th>
                                            <th style="background: #FFFF00">ACCIONES</th>

                                        </thead>

                                        <tbody >
                                            <tr v-for="carrera in filtroCarrera">
                                            <td>@{{carrera.id}}</td>
                                                <td>@{{carrera.carrera}}</td>
                                                <!--<td><img v-bind:src=producto.foto width="50" height="60"></td>-->
                                                <!--<td ><img href="prods/@{{producto.foto}}" alt=""></td>-->
                            

                                                <td><!--El .prevent evita que se recargue la pagina-->
                                                    <button class="btn btn-sm" @click.prevent="editandoCarrera(carrera.id)">
                                                        <i class="fas fa-pen"></i>
                                                    </button>

                                                    <button class="btn btn-sm" @click.prevent="eliminarCarrera(carrera.id)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- FIN DE LA TABLA -->

                                </div><!--div.card.body-->
                            
                                
                            </div>
                        </div>  
                <!-- FIN DE COL-MD-12 -->
              
              </div>
				
	        </div><!--fin de row-->
          <!--AQUI EMPIEZA PLANTILLA MODAL LIMPIO-->
          <!--EL id es el nombre con el que se va a hablar la ventana modal-->
          <div class="modal fade" id="mostrarModalCarrera" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">Agregando</h5>
                  <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==false">Editando</h5>
                  <button type="button" class="close" @click="cerrarModalCarrera()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <form>
                    <!--AQUI VA EL CONTENIDO-->
                    <h1>Carrera</h1>
                    <input type="text" class="form-control" placeholder="id" v-model="id_car"><br>
                    <input type="text" class="form-control" placeholder="carrera" v-model="carrera">
                    <!--AQUI TERMINA EL CONTENIDO-->
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" @click="cerrarModalCarrera()">Cerrar</button>
                  <button type="button" class="btn btn-primary" @click="guardarCarrera()" v-if="agregando==true">Guardar</button>
                  <button type="button" class="btn btn-primary" @click="actualizarCarrera()" v-if="agregando==false">Guardar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- aqui termina el modal-->
        	
        	<!--AQUI TERMINA EL CONTENIDO-->
        </form>
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>-->
        <button type="button" class="btn btn-primary" @click="CerrarModalCarrera()">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- AQUI TERMINA MODAL CARRERA-->

</div><!--AQUI TERMINA VUE-->
@endsection

@push('scripts')
    <script type="text/javascript" src="js/vue-resource.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	  <script type="text/javascript" src="js/apis/apiGrupo.js"></script>
	  <script src="js/vue.js"></script>
	
@endpush

<input type="hidden" name="route" value="{{url('/')}}">
<!--termina plantilla limplia-->