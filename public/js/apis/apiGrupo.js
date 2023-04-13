function init() {
var ruta = document.querySelector("[name=route]").value;

var apiGrupo=ruta + '/apiGrupo';
var apiAlumno =ruta + '/apiAlumno';
var apiCarrera=ruta + '/apiCarrera';
 
new Vue({

	http: {
      headers: {
        'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
      }
    },

	el:"#grupos",

	data:{
		//inicio de arreglos 
	grupos:[],
	Alumnos:[],
	Carreras:[],
		//fin de arreglos
		//inicio buscar para los filtros
	buscar:'',
	buscar2:'',
	buscar3:'',
		//fin buscar para los filtros

	id_grupo:'',
	grupo:'',
	agregando:'',
	},
	// AL CREARSE LA PAGINA
	created:function(){
		this.obtenerGrupo();
		this.obtenerAlumno();
		this.obtenerCarrera();
    },
	methods:{

        //inicio metodos obtener
        obtenerGrupo:function(){
			
			this.$http.get(apiGrupo).then(function(json){
				this.grupos=json.data;
		    	console.log(json.data);
			}).catch(function(json){
				console.log(json);
			});
		}, 
		obtenerAlumno:function(){
			this.$http.get(apiAlumno).then(function(json){
				this.Alumnos=json.data;
				console.log(json.data);
			}).catch(function(json){
				console.log(json.data);
			});
		},
		obtenerCarrera:function(){
			this.$http.get(apiCarrera).then(function(json){
				this.Carreras=json.data;
				console.log(json.data);
			}).catch(function(json){
				console.log(json.data);
			});
		},
		//fin de metodos obtener
		//inicio metodos mostrar modal
		mostrareditandoAlumno:function(){
			this.agregando=false;
			$('#modalAlumno').modal('show');
		},
		MostrarModalGrupo:function(){
			$('#MostrarModalGrupo').modal('show');
		},
		mostrarModalGrupo:function(){

			$('#modalGrupo1').modal('show');
		},
		mostrarModal:function(){
			this.agregando=true;
			this.id_grupo='';
			this.grupo='';
			
			$('#modalGrupo').modal('show');
	
		},
		mostrarModalAlumno:function(){
			this.agregando=true;
			$('#modalAlumno').modal('show');
		},
		MostrarModalCarrera:function(){
			$('#MostrarModalCarrera').modal('show');
		},
		//fin de metodos mostrar modal
		//inicio metodos cerrar modal
		modalGrupo:function(){
			$('#modalGrupo').modal('hide');
		},
		CerrarModalGrupo:function(){
			$('#MostrarModalGrupo').modal('hide');
		},
		cerrarModalAlumno:function(){
			$('#modalAlumno').modal('hide');
		},
		cerrarModalCarrera:function(){
			$('#MostrarModalCarrera').modal('hide');
		},
		//fin metodos cerrar modal
		//Inicio metodos guardar 
		guardarGrupo:function(){

			var grupo={ grupo:this.grupo,
			};
			
			this.$http.post(apiGrupo,grupo).then(function(j){
				this.obtenerGrupo();
				this.grupo='';

				}).catch(function(j){
					console.log(j);
				});

				$('#modalGrupo').modal('hide');

				console.log(grupo);
		},
		//fin de metodos guardar
		//inicio de metodos eliminar
		eliminarGrupo:function(id){
			var confir=confirm('Está seguro de eliminar el grupo?');

			if (confir)
			{
				this.$http.delete(apiGrupo + '/' + id).then(function(json){
					this.obtenerGrupo();
				}).catch(function(json){

				});
			}
		},
		//termina metodos eliminar
		//empieza metodos editar
		editandoGrupo:function(id){
			this.agregando=false;
			this.id_grupo=id;
			//console.log(this.id_grupo);
			this.$http.get(apiGrupo + '/' + id).then(function(json){
				this.grupo=json.data.grupo;
			});

			//$('#modalGrupo').modal('show');

			
			$('#modalGrupo').modal('show');

		},
		//termina metodos editar
		//empieza metodos actualizar
		actualizarGrupo:function(){
			
			var jsonGrupo = {
				grupo:this.grupo
			};

			this.$http.patch(apiGrupo + '/' + this.id_grupo,jsonGrupo).then(function(json){
				this.obtenerGrupo();
				this.grupo=json.data.grupo;
			})
			$('#modalGrupo').modal('hide');
		},
		//fin de metodos actualizar
		
	},
	// FIN DE METHODS


	// INICIO COMPUTED
	computed:{
		//inicio computed filtros
        filtroGrupo:function(){
            return this.grupos.filter((id_grupo)=>{
                return id_grupo.grupo.toLowerCase().match(this.buscar.toLowerCase().trim())
            });

        },
		filtroAlumno:function(){
			return this.Alumnos.filter((id_matricula)=>{
				return id_matricula.nombre.toLowerCase().match(this.buscar2.toLowerCase().trim())
			});
		},
		//fin computed filtros
 
	
	}
	// FIN DE COMPUTED

});
} window.onload = init;