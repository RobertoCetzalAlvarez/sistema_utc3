function init() {
var ruta = document.querySelector("[name=route]").value;

var apiEmpleado = ruta + '/apiEmpleado';
//var apiEmpleado='http://127.0.0.1:8000/apiEmpleado'

new Vue({


	http: {
      headers: {
        'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
      }
    },

	el:"#empleados",

	data:{
		empleados:[],
		num_empleado:'',
		nombre:'',
		ap_p:'',
		ap_m:'',
		agregando:true,

		cantidad:0,
		precio:0,
		buscar:'',




	},

	// AL CREARSE LA PAGINA
	created:function(){
		this.obtenerEmpleados();
	},

	methods:{
		obtenerEmpleados:function(){
			
			this.$http.get(apiEmpleado).then(function(json){
				this.empleados=json.data;
				console.log(json.data);
			}).catch(function(json){
				console.log(json);
			});
		},


		mostrarModal:function(){
			this.agregando=true;
			this.nombre='';
			this.ap_p='';
			this.ap_m='';
			
			$('#modalEmpleados').modal('show');
		},

		guardarEmpleado:function(){
			
			// Se construye el json para enviar al controlador
			var empleados={nombre:this.nombre,
				ap_p:this.ap_p,
				ap_m:this.ap_m
				};

			    // console.log(mascota);

			// Se envia los datos en json al controlador
			this.$http.post(apiEmpleado,empleados).then(function(j){
				this.obtenerEmpleados();
				this.nombre='';
				this.ap_p='';
				this.ap_m='';


			}).catch(function(j){
				console.log(j);
			});


			
			$('#modalEmpleados').modal('hide');

			console.log(empleados);



		},

		eliminarEmpleado:function(id){
			var confir= confirm('Esta seguro de eliminar al empleado?');

			if (confir)
			{
				this.$http.delete(apiEmpleado + '/' + id).then(function(json){
					this.obtenerEmpleados();
				}).catch(function(json){

				});
			}
		},


		editandoEmpleado:function(id){
			this.agregando=false;
			this.num_empleado=id;

			this.$http.get(apiEmpleado + '/' + id).then(function(json){
			  // console.log(json.data);
			  this.nombre=json.data.nombre;
			  this.ap_p=json.data.ap_p;
			  this.ap_m=json.data.ap_m;
			  


			});

			$('#modalEmpleados').modal('show');

		},

		actualizarEmpleado:function(){

			var jsonEmpleados = {nombre:this.nombre,
							   ap_p:this.ap_p,
							   ap_m:this.ap_m
								};

			// console.log(jsonEmpleado);

			this.$http.patch(apiEmpleado + '/' + this.num_empleado,jsonEmpleados).then(function(json){
				this.obtenerEmpleados();
				this.nombre=json.data.nombre;
			  this.ap_p=json.data.ap_p;
			  this.ap_m=json.data.ap_m;

			});
			$('#modalEmpleados').modal('hide');
		},

		// obtenerEmpleados:function(){
		// 	this.$http.get(apiEspecie).then(function(json){
		// 		this.especies=json.data;
		// 	})
		// },

		// obtenerRazas(e){
		// 		var id_especie=e.target.value;
		// 		// console.log(id_especie);

		// 		this.$http.get(ruta + '/getRazas/' + id_especie ).then(function(j){
		// 			this.razas=j.data;
		// 		});

		// }

	},
	// FIN DE METHODS



	// INICIO COMPUTED
	computed:{
		// total:function(){
		// 	var t=0;
		// 	t= this.cantidad * this.precio;
		// 	return t;
		// },

		filtroEmpleados:function(){
			return this.empleados.filter((num_empleado)=>{
				return num_empleado.nombre.toLowerCase().match(this.buscar.toLowerCase().trim()) 

			});
		}
	}
	// FIN DE COMPUTED



});
} window.onload = init;