<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body class="antialiased">
    <header id="carrusel-contenido">
        
            <div id="carrusel-caja">
                <div class="carrusel-elemento">
                    
                    <img class="imagenes" href="" src="img/utc5.jpeg" >
                </div>
                <div class="carrusel-elemento">   
                    <img class="imagenes" href="" src="img/utc1.png">
                </div>
                <div class="carrusel-elemento">   
                    <img class="imagenes" href="" src="img/utc7.jpeg">                        
                </div>
            </div>
    </header>
        
    <table class="tabla-desktop">
            <tr>
                <th style="color: #FFFFFF80 " >login</th>
                <th style="color: #FFFFFF80 ">login</th>
                <th style="color: #FFFFFF80 ">login</th>
                <th style="color: #FFFFFF80 ">login</th>
                
                <th  href="">
                <a href="/login">login</a>
                </th>
                <th hidden="">
                <a href="/register">Register</a>
                </th>
            </tr>

    </table>
    <div class="container">
       
        <div class="card">
            <img src="img/alumno.png">
            <h4>Alumno</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, excepturi unde?</p>
            <a href="/login">acceder</a>
        </div>
        
        <div class="card">
            <img src="img/coordinador.png">
            <h4>coordinador</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, excepturi unde?</p>
            <a href="/login">acceder</a>
        </div>
        
        <div class="card">
            <img src="img/finanzas.png">
            <h4>finanzas</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, excepturi unde?</p>
            <a href="/login">Acceder</a>
        </div>
        <div class="card">
            <img src="img/profesor.png">
            <h4>Profesor</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, excepturi unde?</p>
            <a href="/login">acceder</a>
        </div>
        
        <div class="card">
            <img src="img/servicios_escolares.png">
            <h4>Servicios Escolares</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, excepturi unde?</p>
            <a href="#">acceder</a>
        </div>
        
        <div class="card">
            <img src="img/tutor.png">
            <h4>Tutor</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, excepturi unde?</p>
            <a href="/login">Acceder</a>
        </div>
        
    </div>
            
</body>
</html>