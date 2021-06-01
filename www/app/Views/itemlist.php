<!DOCTYPE HTML>
<html>
   <head>
      <title>Epico! - Items</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
      <!-- Custom css -->
      <style>
          .m-r-1em{ margin-right:1em; }
          .m-b-1em{ margin-bottom:1em; }
          .m-l-1em{ margin-left:1em; }
          .mt0{ margin-top:0; }
      </style>
   </head>
   <body>
      <div class="container">

        <div class="pb-2 mt-4 mb-2 border-bottom">
            <h2>Leer ítems</h2>
        </div>

        <?php 
            if(session()->has('message')){
        ?>
        <div class="alert <?= session()->getFlashdata('alert-class') ?>">
           <?= session()->getFlashdata('message') ?>
        </div>
        <?php
            }
        ?>

        <a href='/additem' class='btn btn-primary m-b-1em'>Crear ítem</a>

        <div class='table-responsive'>
          <table class='table table-hover table-bordered'>
            <tr>
               <th>Nombre</th>
               <th>Categoría</th>
               <th>Costo</th>
               <th>Precio unitario</th>
               <th>Imagen</th>
               <th></th>
            </tr>
            <?php if($items): ?>
            <?php foreach($items as $item): ?>
            <tr>
              <td><?php echo $item['name']; ?></td>
              <td><?php echo $item['category']; ?></td>
              <td><?php echo $item['cost_price']; ?></td>
              <td><?php echo $item['unit_price']; ?></td>
              <td><a href="<?php echo $item['pic_filename']; ?>" target="_blank">Ver imagen</a></td>
              <td>
                <a href="<?php echo base_url('edititems/'.$item['id']);?>" class="btn btn-primary m-r-1em">Editar</a>
                <a href="<?php echo base_url('delete/'.$item['id']);?>" class="btn btn-danger">Eliminar</a>
              </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
          </table>
        </div>

      </div>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>           
      <!-- Latest compiled and minified Bootstrap JavaScript -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   </body>
</html>