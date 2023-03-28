function init() {
var ruta = document.querySelector("[name=route]").value;

var apiGrupo=ruta + '/apiGrupo';


 
new Vue({

	http: {
      headers: {
        'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
      }
    },

	el:"#grupos",

	data:{
	grupos:[],
	buscar:'',
	id_grupo:'',
	grupo:'',
	agregando:'',
	},
	// AL CREARSE LA PAGINA
	created:function(){
		this.obtenerGrupo();
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
		//fin de metodos obtener
		//inicio metodos mostrar modal
		mostrarModal:function(){
			this.agregando=true;
			this.id_grupo='';
			this.grupo='';
			
			$('#modalGrupo').modal('show');
	
		},
		//fin de metodos mostrar modal
		//inicio metodos cerrar modal
		modalGrupo:function(){
			$('#modalGrupo').modal('hide');
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
			console.log(this.id_grupo);
			this.$http.get(apiGrupo + '/' + id).then(function(json){
				this.grupo=json.data.grupo;
			});

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
        filtroGrupo:function(){
            return this.grupos.filter((id_grupo)=>{
                return id_grupo.grupo.toLowerCase().match(this.buscar.toLowerCase().trim())
            });

        },
 
	
	}
	// FIN DE COMPUTED

});
} window.onload = init;