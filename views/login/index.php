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
<div class="contenedor-formularios" id="formP">
<img class="centerLogo" src="<?php echo constant('URL'); ?>/img/logo.png" alt="">   
<br>   
    <h2 class="center">Inicio de Sesión</h2> 
    <br>   
    <form action="<?php echo constant('URL'); ?>/login/validarUsuario" method="post" id="usuarios">    
                    <div class="contenedor-input">
                        <label>
                            Usuario <span class="req">*</span>
                        </label>
                        <input type="text" required name="codigo">
                    </div>
                    <div class="contenedor-input" id="grupo_pass">
                        <label>
                            Contraseña <span class="req">*</span>
                        </label>
                        <input type="password" required name ="pass"> 
                    </div>
                    <p class="formulario__input-error">La contraseña debe tener al menos un Número, una letra mayúscula, una letra minúscula, un caracter especial y una longitud mayor a 8.</p>
                    <input type="submit" class="button button-block" value="Login">
                </form>
</div>
<?php require 'views/footer.php'; ?>
</body>
</html>