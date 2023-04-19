function init() {
    var ruta = document.querySelector("[name=route]").value;
    
    var apiPre=ruta + '/apiPre';
    var apiAlumno =ruta + '/apiAlumno1';
    var apiCarrera=ruta + '/apiCarrera';
    
     
    new Vue({
    
        http: {
          headers: {
            'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
          }
        },
    
        el:"#finanzas",
    
        data:{
            //inicio de arreglos 
        grupos:[],
        Alumnos:[],
        Carreras:[],
            //fin de arreglos
        folio:'',
            //inicio buscar para los filtros
        buscar:'',
        buscar2:'',
        buscar3:'',
            //fin buscar para los filtros
            //inicio llaves primarias
        id_grupo:'',
        id_carrera:'',
        //fin de llaves primarias
        //inicia variable inicializada para la tabla grupos
        grupo:'',
        //fin de variable inicializada para la tabla grupos
        //inicio variable inicializada para tabla carreras
        id_car:'',
        carrera:'',
        //fin variable inicializada para tabla carreras
        agregando:'',
        //inicio descompocicion de la matricula
        ma:'',
        tri:'',
        cula:'',
        matricula:'',
        id_matricula:'',
    
        //fin descompocicion de la matricula
        //datos alumno
        nombre:'',
        ap_p:'',
        ap_m:'',
        curp:'',
        nns:'',
        localidad:'',
        calle_int:'',
        calle_ex:'',
        //id_carrera:'',
        id_salon:'',
        //fin datos alumno
        numero:0,
        },
        // AL CREARSE LA PAGINA
        created:function(){
            this.obtenerPreinscripcion();
            this.obtenerAlumno();
            this.obtenerCarrera();
        },
        methods:{
    
            //inicio metodos obtener
            obtenerPreinscripcion:function(){
                
                this.$http.get(apiPre).then(function(json){
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
                this.matricula='',
                this.nombre=''
                this.ap_p='';
                this.ap_m='';
                this.curp='';
                this.nns='';
                this.localidad='';
                this.calle_int='';
                this.calle_ex='';
                this.id_car='';
                this.numero=0;


                $('#MostrarModalGrupo').modal('show');
            },
            mostrarModalGrupo:function(){
    
                $('#modalGrupo1').modal('show');
            },
            mostrarModal:function(){//modal para añadir grupo
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
                this.agregando=true;
                $('#MostrarModalCarrera').modal('show');
            },
            //muestra el modal para agregar carrera
            mostrarModalCarrera:function(){
                this.agregando=true;/*se limpia
                las variables para que aparezcan
                vacias*/
                this.id_car='';
                this.carrera='';
                $('#mostrarModalCarrera').modal('show');
            },
            //fin de metodos mostrar modal
            //inicio metodos cerrar modal
            modalGrupo:function(){
                $('#modalGrupo').modal('hide');
            },
            CerrarModalGrupo:function(){
                $('#MostrarModalGrupo').modal('hide');
            },
    
            cerrarModalAlumno:function(){/*modal que cierra para alumnos*/
                    this.matricula='',
                    this.nombre=''
                    this.ap_p='';
                    this.ap_m='';
                    this.curp='';
                    this.nns='';
                    this.localidad='';
                    this.calle_int='';
                    this.calle_ex='';
                    this.id_car='';
                    this.numero=0;
    
                $('#modalAlumno').modal('hide');
            },
            cerrarModalCarrera:function(){
                $('#MostrarModalCarrera').modal('hide');
            },
            cerrarModalCarrera:function(){
                $('#mostrarModalCarrera').modal('hide');
            },
            CerrarModalCarrera:function(){
                $('#MostrarModalCarrera').modal('hide');
            },
            //fin metodos cerrar modal
            //Inicio metodos guardar 
            guardarAlumno:function(){
                var Alumno={
                    id_matricula:this.matricula,
                    nombre:this.nombre,
                    ap_p:this.ap_p,
                    ap_m:this.ap_m,
                    curp:this.curp,
                    nns:this.nns,
                    localidad:this.localidad,
                    calle_int:this.calle_int,
                    calle_ex:this.calle_ex,
                    id_carrera:this.id_car,
                    numero:this.numero,
                    /*id_salon:this.id_salon,*/
                };
                swal({
                    title: "Esta seguro de Guardar el Alumno?",
                    text: "Las Correcciones Se Hacen En Servicios Escolares!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                        this.$http.post(apiAlumno,Alumno).then(function(json){
                            this.obtenerAlumno();
                            this.matricula='',
                            this.nombre=''
                            this.ap_p='';
                            this.ap_m='';
                            this.curp='';
                            this.nns='';
                            this.localidad='';
                            this.calle_int='';
                            this.calle_ex='';
                            this.id_car='';
                            this.numero=0;
                        }).catch(function(json){
                            console.log(json);
                        });
                        $('#modalAlumno').modal('hide');

                      swal("El Alumno Se Ha Guardado Correctamente", {
                        icon: "success",
                      });
                    } else {
                      swal("Cancelado");
                    }
                  });
                
            },
            guardarGrupo:function(){
    
                var grupo={ grupo:this.grupo,
                };
                
                this.$http.post(apiPre,grupo).then(function(j){
                    this.obtenerPreinscripcion();
                    this.grupo='';
    
                    }).catch(function(j){
                        console.log(j);
                    });
    
                    $('#modalGrupo').modal('hide');
    
                    console.log(grupo);
            },
            guardarCarrera:function(){
                var carrera={
                    id:this.id_car,
                    carrera:this.carrera,
                };
                this.$http.post(apiCarrera,carrera).then(function(j){
                    this.obtenerCarrera();
                    this.id_car='';
                    this.carrera='';
    
                    }).catch(function(j){
                        console.log(j);
                    });
    
                    $('#mostrarModalCarrera').modal('hide');
    
                    console.log(carrera);
            },
            //fin de metodos guardar
            //empieza metodos editar
            BuscarAspirante:function(id){
                this.$http.get(apiPre + '/' + '0001').then(function(json){
                    console.log(json);
                    this.matricula=json.data.id;
                    this.nombre=json.data.nombre;
                    this.ap_p=json.data.ap_p;
                    this.ap_m=json.data.ap_m;
                    this.curp=json.data.curp;
                    this.nns=json.data.nns;
                    this.localidad=json.data.localidad;
                    this.calle_int=json.data.calle_int;
                    this.calle_ex=json.data.calle_ex;
                    this.id_car=json.data.id_carrera;
                    
                })

            },
            editandoAlumno:function(id){
                this.agregando=false;
                /*se inicializa el id para 
                posterior mente se pueda actualizar en el metodo actualizar*/
                this.id_matricula=id;
                this.$http.get(apiAlumno + '/' + id).then(function(json){
                    console.log(json);
                    this.matricula=json.data.id_matricula;
                    this.nombre=json.data.nombre;
                    this.ap_p=json.data.ap_p;
                    this.ap_m=json.data.ap_m;
                    this.curp=json.data.curp;
                    this.nns=json.data.nns;
                    this.localidad=json.data.localidad;
                    this.calle_int=json.data.calle_int;
                    this.calle_ex=json.data.calle_ex;
                    this.id_car=json.data.id_carrera;
                    
                })
                $('#modalAlumno').modal('show');
            },
            editandoGrupo:function(id){
                this.agregando=false;
                /*se inicializa el id para 
                posterior mente se pueda actualizar en el metodo actualizar*/
                this.id_grupo=id;
                
                //console.log(this.id_grupo);
                this.$http.get(apiPre + '/' + id).then(function(json){
                    this.grupo=json.data.grupo;
                });
    
                //$('#modalGrupo').modal('show');
    
                
                $('#modalGrupo').modal('show');
    
            },
            editandoCarrera:function(id){
                this.agregando=false;
                /*se inicializa el id para 
                posterior mente se pueda actualizar en el metodo actualizar*/
                this.id_carrera=id;
                //console.log(this.id_carrera);
                this.$http.get(apiCarrera + '/' + id).then(function(json){
                    //se inicializan las variables para que aparescan en el input
                    this.id_car=json.data.id;
                    this.carrera=json.data.carrera;
                    //console.log(this.carrera);
                });
    
                $('#mostrarModalCarrera').modal('show');
            },
            //termina metodos editar
            //empieza metodos actualizar
            actualizarAlumno:function(){
                var jsonAlumno = {
                    id_matricula:this.matricula,
                    nombre:this.nombre,
                    ap_p:this.ap_p,
                    ap_m:this.ap_m,
                    curp:this.curp,
                    nns:this.nns,
                    localidad:this.localidad,
                    calle_int:this.calle_int,
                    calle_ex:this.calle_ex,
                    id_carrera:this.id_car,
                    //numero:this.numero,
                };
                this.$http.patch(apiAlumno + '/' + this.id_matricula,jsonAlumno).then(function(json){
                    this.obtenerAlumno();
                    this.matricula=json.data.id_matricula;
                    this.nombre=json.data.nombre;
                    this.ap_p=json.data.ap_p;
                    this.ap_m=json.data.ap_m;
                    this.curp=json.data.curp;
                    this.nns=json.data.nns;
                    this.localidad=json.data.localidad;
                    this.calle_int=json.data.calle_int;
                    this.calle_ex=json.data.calle_ex;
                    this.id_car=json.data.id_carrera;
                })
                $('#modalAlumno').modal('hide');
    
            },
            actualizarGrupo:function(){
                
                var jsonGrupo = {
                    grupo:this.grupo
                };
                this.$http.patch(apiPre + '/' + this.id_grupo,jsonGrupo).then(function(json){
                    this.obtenerPreinscripcion();
                    this.grupo=json.data.grupo;
                })
                $('#modalGrupo').modal('hide');
            },
            actualizarCarrera:function(){
                var jsonCarrera={
                    id:this.id_car,
                    carrera:this.carrera
                };
                //rutina de busqueda para evitar llaves primarias repetidas
                var encontrado=0;
                for (let i = 0; i < this.Carreras.length; i++) {
                    if (this.id_car==this.Carreras[i].id){
    
                        encontrado=1;
                        /*swal('la llave primaria ya se encuentra en uso');
                        swal("la llave primaria ya se encuentra en uso");
                        //alert("la llave primaria ya se encuentra en uso");*/
                        if(encontrado=1){
                            swal({
                                title: 'La clave de carrera ya esta en uso',
                                //text: '¡No podrás deshacer esta acción!',
                                icon: 'warning',
                                showCancelButton: true,
                                cancelButtonText: 'Cancelar'
                              })
                              .then((willDelete) => {
                                if (willDelete) {
                                  swal("No se realizo ningun cambio!", {
                                    icon: "success",
                                  });
                                } else {
                                  swal("Your imaginary file is safe!");
                                  
                                }
                                
                              });
                        }
                        
                        
                    }else{
                        if(encontrado == 0){
                            this.$http.patch(apiCarrera + '/' + this.id_carrera,jsonCarrera).then(function(json){
                                this.obtenerCarrera();
                                this.id_car=json.data.id;
                                this.carrera=json.data.carrera;
                            })
                            swal("Cambios aplicados", "", "Exitosamente");
        
                            $('#mostrarModalCarrera').modal('hide');
                        }
                        
    
                    }
                    
                  }
    
            },
            //fin de metodos actualizar
            //inicio de metodos eliminar
            eliminarGrupo:function(id){
                var confir=confirm('Está seguro de eliminar el grupo?');
    
                if (confir)
                {
                    this.$http.delete(apiPre + '/' + id).then(function(json){
                        this.obtenerPreinscripcion();
                    }).catch(function(json){
    
                    });
                }
            },
            eliminarCarrera:function(id){
                var confir=confirm('Esta seguro de eliminar la Carrera');
                if (confir){
                    this.$http.delete(apiCarrera + '/' + id).then(function(json){
                        this.obtenerCarrera();
                    }).catch(function(json){
                        console.log(json);
                    });
                }
            },
            eliminarAlumno:function(id){
                var confir=confirm('Esta seguro de eliminar la carrera');
                if(confir){
                    this.$http.delete(apiAlumno + '/' + id).then(function(json){
                        this.obtenerAlumno();
                    }).catch(function(json){
                        console.log(json);
                    });
                }
            },
            //termina metodos eliminar
            
        },
        // FIN DE METHODS
    
    
        // INICIO COMPUTED
        computed:{
            //obtiene el siguiente numero de alumno
            obtenerSiguienteNumero() {
                /* var total=0;
                for (let i = 0; i < this.Alumnos.length; i++) {
                    total= this.Alumnos[i].numero;
                    console.log(total);
                }
                return total;*/
                const ultimoObjeto = this.Alumnos[this.Alumnos.length - 1];
                const ultimoNumero = ultimoObjeto ? ultimoObjeto.numero : '0000';
                const siguienteNumero = parseInt(ultimoNumero) + 1;
                const numeroCompleto = siguienteNumero.toString().padStart(4, '0');
                this.numero=numeroCompleto;
                return this.numero;
              },
              
            obtenerDosUltimosNumerosDelAnio() {
                const anio = new Date().getFullYear();
                /*se inicializa una variable 
                para que se pueda usar posteriormente*/
                this.ma=anio.toString().slice(-2);
                return this.ma;
            },
            matricula1(){
                var matricula ='';
                //ini=this.ma+this.tri+this.cula;
                this.ma=this.obtenerDosUltimosNumerosDelAnio;
                this.tri=this.id_car;
                this.cula=this.obtenerSiguienteNumero;
                this.matricula=this.ma + this.tri + this.cula;
                return this.matricula;
            },
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
            filtroCarrera:function(){
                return this.Carreras.filter((id)=>{
                    return id.carrera.toLowerCase().match(this.buscar3.toLowerCase().trim())
                });
            },
        
        },
        // FIN DE COMPUTED
    
    });
    } window.onload = init;