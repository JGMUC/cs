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
            <?php require_once 'models/cliente/clienteshema.php';
               foreach ($this->clientes as $row) {
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
      <div class="contenedor-formularios" id="formP">
         <h2 class="center">Crear Nuevo Cliente</h2>
         <form action="<?php echo constant('URL'); ?>cliente/crearCliente" method="post" id="clientes">
            <div class="contenedor-input">
               <label>
               Razón Social <span class="req">*</span>
               </label>
               <input type="text" required name="razon">
            </div>
            <div class="contenedor-input">
               <label>
               Nit <span class="req">*</span>
               </label>
               <input type="text" required name="nit">
            </div>
            <div class="contenedor-input">
               <label>
               Representante Legal <span class="req">*</span>
               </label>
               <input type="text" required name="rpl">
            </div>
            <div class="contenedor-input" id="grupo_correo">
               <label>
               Email <span class="req">*</span>
               </label>
               <input type="email" required name="correo">
               <p class="formulario__input-error">No ha ingresado un correo válido</p>
            </div>
            <div class="fila-arriba">
               <div class="contenedor-select">
                  <label>
                  Departamento <span class="req">*</span>
                  </label>
                  <select  required name="depto" id="depto">
                     <?php 
                        $data=$this->ciudades;
                           $deptosNombres = array_unique(array_column($data, 'NombreDep'));
                           $deptosIds = array_unique(array_column($data, 'IdDep'));
                           foreach ($deptosNombres as $k => $NombreDep) {
                           ?> 
                     <option value="<?php echo $deptosIds[$k];?>"><?php echo $NombreDep?></option>
                     <?php } ?>      
                  </select>
               </div>
               <div class="contenedor-select">
                  <label>
                  Ciudad <span class="req">*</span>
                  </label>
                  <select  required name="ciudad" id="ciudad">
                  </select>
               </div>
            </div>
            <div class="contenedor-input">
               <label>
               Dirección <span class="req">*</span>
               </label>
               <input type="text" required name="dir">
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
            <input type="submit" class="button button-block" value="Crear Cliente">
         </form>
      </div>
      <?php require 'views/footer.php'; ?>    
   </body>
   <script type="application/javascript">
      const ciudades = Array();
      <?php
         foreach($deptosIds as $IdDep) {
             $ciudades = array_values(array_filter($data, function($row) use ($IdDep) {
                 return $row['IdDep'] === $IdDep;
             } ));
             ?>
      ciudades[<?php echo $IdDep;?>] = [ <?php
         for ($i = 0; $i < count($ciudades) - 1; $i++ ) {
             ?>{ id: <?php echo $ciudades[$i]['IdCiu']; ?>, name: "<?php echo $ciudades[$i]['NombreCiu']; ?>" }, <?php
         }
         ?>{ id: <?php echo $ciudades[$i]['IdCiu']; ?>, name: "<?php echo $ciudades[$i]['NombreCiu']; ?>" } ];
      <?php
         }
         ?>
      document.getElementById('depto').addEventListener('change', function(e) {
          let ownCiudad = ciudades[e.target.value];
      
          let ciudadDropdown = document.getElementById('ciudad');
          ciudadDropdown.innerText = null;
      
          ownCiudad.forEach( function(c) {
              var option = document.createElement('option');
              option.text = c.name;
              option.value = c.id;
              ciudadDropdown.appendChild(option);
          } )
      });
   </script>
</html>