<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Clientes</title>
      <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css">
   </head>
   <body>
      <?php require 'views/header.php'; ?>
      <br>
      <h2 class="center">Lista de Clientes</h2>
      <table class="styled-table">
         <thead class="styled-table">
            <tr>
               <th>Id</th>
               <th>Razón Social</th>
               <th>Nit</th>
               <th>Representante legal</th>
               <th>Ciudad</th>
               <th>Correo</th>
               <th>direccion</th>
               <th>Estado</th>
            </tr>
         </thead>
         <tbody>
            <?php require_once 'models/consultaclientes/clienteshema.php';
               foreach ($this->consultaclientes as $row) {
                 $cliente = new ClienteSchema();
                 $cliente = $row;
               ?> 
            <tr>
               <td><?php echo $cliente->id?></td>
               <td><?php echo $cliente->razon?></td>
               <td><?php echo $cliente->nit?></td>
               <td><?php echo $cliente->rpl?></td>
               <td><?php echo $cliente->ciudad?></td>
               <td><?php echo $cliente->correo?></td>
               <td><?php echo $cliente->direccion?></td>
               <td><?php echo $cliente->estado?></td>
            </tr>
            <?php } ?>  
         </tbody>
      </table>
      <?php require 'views/footer.php'; ?>    
   </body>
</html>