<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css">
</head>
<body>
    <div  id="header">
    <nav class="nav">
        <ul class="nav__list">
            <li><a href="<?php echo constant('URL'); ?>main">Inicio</a></li>
            <li>
				<a href="#">Usuarios</a>
				<ul>
					<li><a href="<?php echo constant('URL'); ?>usuario">Listar y Crear</a></li>
				</ul>
			</li>
            <li>
                <a href="">Clientes</a>
                <ul>
					<li><a href="<?php echo constant('URL'); ?>usuario">Listar y Crear</a></li>
                    <li><a href="<?php echo constant('URL'); ?>usuario">Consultas</a></li>
				</ul>
            </li>
            <li><a href="<?php echo constant('URL'); ?>login/logOut">Salir</a></li>
        </ul>
        </nav>
    </div>
</body>
</html>