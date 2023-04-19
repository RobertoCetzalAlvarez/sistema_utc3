function init() {
    var ruta = document.querySelector("[name=route]").value;
    
    var apiAlumno = ruta + '/apiAlumno';
    var apiProfesor = ruta + '/apiProfesor';
    //var apiAlumno='http://127.0.0.1:8000/apiAlumno'
    
    new Vue({
    
    
        http: {
          headers: {
            'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
          }
        },
    
        el:"#alumnos",
    
        data:{
            //Inicio de arreglos
            alumnos:[],
            profesores:[],
            //Fin de arreglos
            id_matricula:'',
            nombre:'',
            ap_p:'',
            ap_m:'',
            curp:'',
            nns:'',
            localidad:'',
            calle_int:'',
            calle_ex:'',
            id_carrera:'',
            id_salon:'',
            agregando:true,
    
            cantidad:0,
            precio:0,
            //Inicio para buscar filtros
            buscar:'',
            buscar2:'',
            //Fin para buscar filtros
            //Inicio de llave primaria
            id_profesor:'',
            //Fin de llave primaria 
            //inicia variable inicializada para la tabla profesores
            profesores:'',
            //fin de variable inicializada para la tabla profesores
        },
    
        // AL CREARSE LA PAGINA
        created:function(){
            this.obteneralumnos();
            this.obtenerprofesores();
        },
    
        //Inicio metodo obtener
        methods:{
            obteneralumnos:function(){
                
                this.$http.get(apiAlumno).then(function(json){
                    this.alumnos=json.data;
                    console.log(json.data);
                }).catch(function(json){
                    console.log(json);
                });
            },
            obtenerprofesores:function(){
                
                this.$http.get(apiProfesor).then(function(json){
                    this.profesores=json.data;
                    console.log(json.data);
                }).catch(function(json){
                    console.log(json);
                });
            },
    
            //fin de metodos obtener
		    //inicio metodos mostrar modal
            mostrarModal:function(){
                this.agregando=true;
                this.nombre='';
                this.ap_p='';
                this.ap_m='';
                
                $('#modalalumnos').modal('show');
            },
    
            guardarEmpleado:function(){
                
                // Se construye el json para enviar al controlador
                var alumnos={nombre:this.nombre,
                    ap_p:this.ap_p,
                    ap_m:this.ap_m
                    };
    
                    // console.log(mascota);
    
                // Se envia los datos en json al controlador
                this.$http.post(apiAlumno,alumnos).then(function(j){
                    this.obteneralumnos();
                    this.nombre='';
                    this.ap_p='';
                    this.ap_m='';
    
    
                }).catch(function(j){
                    console.log(j);
                });
    
    
                
                $('#modalalumnos').modal('hide');
    
                console.log(alumnos);
    
    
    
            },
    
            eliminarEmpleado:function(id){
                var confir= confirm('Esta seguro de eliminar al empleado?');
    
                if (confir)
                {
                    this.$http.delete(apiAlumno + '/' + id).then(function(json){
                        this.obteneralumnos();
                    }).catch(function(json){
    
                    });
                }
            },
    
    
            editandoEmpleado:function(id){
                this.agregando=false;
                this.id_matricula=id;
    
                this.$http.get(apiAlumno + '/' + id).then(function(json){
                  // console.log(json.data);
                  this.nombre=json.data.nombre;
                  this.ap_p=json.data.ap_p;
                  this.ap_m=json.data.ap_m;
                  
    
    
                });
    
                $('#modalalumnos').modal('show');
    
            },
    
            actualizarEmpleado:function(){
    
                var jsonalumnos = {nombre:this.nombre,
                                   ap_p:this.ap_p,
                                   ap_m:this.ap_m
                                    };
    
                // console.log(jsonEmpleado);
    
                this.$http.patch(apiAlumno + '/' + this.id_matricula,jsonalumnos).then(function(json){
                    this.obteneralumnos();
                    this.nombre=json.data.nombre;
                  this.ap_p=json.data.ap_p;
                  this.ap_m=json.data.ap_m;
    
                });
                $('#modalalumnos').modal('hide');
            },
    
            // obteneralumnos:function(){
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
    
            filtroalumnos:function(){
                return this.alumnos.filter((id_matricula)=>{
                    return id_matricula.nombre.toLowerCase().match(this.buscar.toLowerCase().trim()) 
    
                });
            }
        }
        // FIN DE COMPUTED
    
    
    
    });
    } window.onload = init;