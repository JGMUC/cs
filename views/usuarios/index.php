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
    <br>
<div class="contenedor-formularios" id="formP">
    <h2 class="center">Crear Nuevo Usuario</h2>    
    <form action="<?php echo constant('URL'); ?>usuario/crearUsuario" method="post" id="usuarios">            
                  <div class="contenedor-select">
                        <label>
                            Rol <span class="req">*</span>
                        </label>
                        <select  required name="rol">
                        <?php require_once 'models/usuario/rolshema.php';
                              foreach ($this->roles as $row) {
                                $rol = new RolSchema();
                                $rol = $row;
                         ?> 
                             <option value="<?php echo $rol->id?>"><?php echo $rol->rol?></option>
                        <?php } ?>      
                    </select>
                    </div>                
                    <div class="fila-arriba">
                        <div class="contenedor-input">
                            <label>
                                Nombre <span class="req">*</span>
                            </label>
                            <input type="text" required name="nombres">
                           
                        </div>
                        <div class="contenedor-input">
                            <label>
                                Apellido <span class="req">*</span>
                            </label>
                            <input type="text" required name="apellido">
                        </div>
                    </div>
                    <div class="contenedor-input">
                        <label>
                            Documento <span class="req">*</span>
                        </label>
                        <input type="text" required name="documento">
                    </div>
                    <div class="contenedor-input">
                        <label>
                            Usuario <span class="req">*</span>
                        </label>
                        <input type="text" required name="codigo">
                    </div>
                    <div class="contenedor-input" id="grupo_correo">
                            <label>
                                Email <span class="req">*</span>
                            </label>
                        <input type="email" required name="correo">
                        <p class="formulario__input-error">No ha ingresado un correo v??lido</p>
                    </div>
                    <div class="contenedor-input">
                        <label>
                            Telefono <span class="req">*</span>
                        </label>
                        <input type="text" required name="telefono">
                    </div>
                    <div class="contenedor-input">
                        <label>
                            Fecha Nacimiento 
                        </label>
                        <input type="date"  name="fechaNaci">
                    </div>
                    <div class="contenedor-input" id="grupo_pass">
                        <label>
                            Contrase??a <span class="req">*</span>
                        </label>
                        <input type="password" required name ="pass">
                        <p class="formulario__input-error">La contrase??a debe tener al menos un N??mero, una letra may??scula, una letra min??scula, un caracter especial y una longitud mayor a 8.</p>
                    </div>

                    <div class="contenedor-input" id ="grupo_rpass">
                        <label>
                            Repetir Contrase??a <span class="req">*</span>
                        </label>
                        <input type="password" required name="rpass">
                        <p class="formulario__input-error">Las contrase??as no coinciden.</p>
                    </div>
                    <div class="contenedor-select">
                        <label>
                            Estado <span class="req">*</span>
                        </label>
                        <select  required name="estado">
                             <option value="A">Activo</option>
                             <option value="I">Inactivo</option>
                    </select>
                    </div> 
                    <input type="submit" class="button button-block" value="Crear Usuario">
                </form>
</div>
<?php require 'views/footer.php'; ?>
<script src="<?php echo constant('URL'); ?>/views/usuarios/valida.js"></script>
</body>
</html>