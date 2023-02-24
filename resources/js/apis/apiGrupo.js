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

		mostrarModal:function(){
			this.agregando=true;
			this.grupo='';
			
			$('#modalGrupo').modal('show');
	
		},

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

		editandoGrupo:function(id){
			this.agregando=false;
			this.id_grupo=id;

			this.$http.get(apiGrupo + '/' + id).then(function(json){
				this.grupo=json.data.grupo;
			});

			$('#modalGrupo').modal('show');

		},

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

		
	},
	// FIN DE METHODS


	// INICIO COMPUTED
	computed:{
        filtroGrupo:function(){
            return this.grupos.filter((id)=>{
                return id_grupo.grupo.toLowerCase().match(this.buscar.toLowerCase().trim())
            });

        },
 
	
	}
	// FIN DE COMPUTED

});