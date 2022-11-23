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
    <h2 class="center">Lista Usuarios PRUEBA DESPLIEGUE AUTOMATICO</h2>
    <table class="styled-table" id="tab">
    <thead class="styled-table">
        <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Fecha Nacimiento</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>    
    <?php require_once 'models/consultausuarios/usuarioshema.php';
                              foreach ($this->consultausuarios as $row) {
                                $usuario = new UsuarioSchema();
                                $usuario = $row;
                         ?> 
                         <tr>
                            <td><?php echo $usuario->id?></td>
                            <td><?php echo $usuario->codigo?></td>
                            <td><?php echo $usuario->rol?></td>
                            <td><?php echo $usuario->documento?></td>
                            <td><?php echo $usuario->nombres?></td>
                            <td><?php echo $usuario->apellidos?></td>
                            <td><?php echo $usuario->correo?></td>
                            <td><?php echo $usuario->telefono?></td>
                            <td><?php echo $usuario->fechaNaci?></td>
                            <td><?php echo $usuario->estado?></td>
                        </tr>
                        <?php } ?>  
    </tbody>
</table>
<input class="pdf" type="button" value="Create PDF" 
          id="btPrint" onclick="exportPDF('tab')" />
      <br><br>
<script src="<?php echo constant('URL'); ?>/public/js/jspdf.min.js"></script>
 <script src="<?php echo constant('URL'); ?>/public/js/jspdf.plugin.autotable.min.js"></script>
<script>
   function exportPDF(){
      window.jsPDF = window.jspdf.jsPDF
  var doc = new jsPDF('l', 'mm', [297, 210]);
  doc.autoTable({ html: '#tab' })
  doc.save('usuarios.pdf')}
</script>
<?php require 'views/footer.php'; ?>
<script src="<?php echo constant('URL'); ?>/views/usuarios/valida.js"></script>
</body>
</html>