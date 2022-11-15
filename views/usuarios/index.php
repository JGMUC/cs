<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css">
</head>
<body>
<?php require 'views/header.php'; ?>
<div class="contenedor-formularios" id="formP">
    <h2 class="center">Crear Nuevo Usuario</h2>
    <form action="<?php echo constant('URL'); ?>/usuario/nuevoUsuario" method="post">            
    <div class="contenedor-select">
                        <label>
                            Rol <span class="req">*</span>
                        </label>
                        <select  required> </select>
                    </div>                
    <div class="fila-arriba">
                        <div class="contenedor-input">
                            <label>
                                Nombre <span class="req">*</span>
                            </label>
                            <input type="text" required >
                        </div>
                        <div class="contenedor-input">
                            <label>
                                Apellido <span class="req">*</span>
                            </label>
                            <input type="text" required>
                        </div>
                    </div>
                    
                    <div class="contenedor-input">
                        <label>
                            Usuario <span class="req">*</span>
                        </label>
                        <input type="text" required>
                    </div>
                    <div class="contenedor-input">
                            <label>
                                Email <span class="req">*</span>
                            </label>
                        <input type="email" required>
                    </div>
                    <div class="contenedor-input">
                        <label>
                            Telefono <span class="req">*</span>
                        </label>
                        <input type="text" required>
                    </div>
                    <div class="contenedor-input">
                        <label>
                            Fecha Nacimiento <span class="req">*</span>
                        </label>
                        <input type="date" required>
                    </div>
                    <div class="contenedor-input">
                        <label>
                            Contraseña <span class="req">*</span>
                        </label>
                        <input type="password" required>
                    </div>

                    <div class="contenedor-input">
                        <label>
                            Repetir Contraseña <span class="req">*</span>
                        </label>
                        <input type="password" required>
                    </div>
                    
                 

                    <input type="submit" class="button button-block" value="Registrarse">
                </form>
</div>
<div id="tablausu">
    <h2 class="center">Lista Usuarioa</h2>
</div>
<?php require 'views/footer.php'; ?>
</body>
</html>