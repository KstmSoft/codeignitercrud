<!DOCTYPE HTML>
<html>
    <head>
        <title>Epico! | Editar ítem</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container">

            <div class="pb-2 mt-4 mb-2 border-bottom">
                <h2>Editar ítem</h2>
            </div>

            <?php 
                if(session()->has('add-error')){
            ?>
            <div class="alert <?= session()->getFlashdata('alert-class') ?>">
               <?= session()->getFlashdata('add-error') ?>
            </div>
            <?php
                }
            ?>

            <form id="edititem" method="post" enctype="multipart/form-data" action="<?= site_url('/update') ?>">
                <div class="table-responsive">
                    <table class='table table-hover table-bordered'>
                        <input type="hidden" name="id" value="<?php echo $item_obj['id']; ?>">
                        <tr>
                            <td>Nombre</td>
                            <td><input type='text' name='name' class='form-control' value='<?php echo $item_obj["name"]; ?>'/></td>
                        </tr>
                        <tr>
                            <td>Categoría</td>
                            <td><input type='text' name='category' class='form-control' value='<?php echo $item_obj["category"]; ?>'/></td>
                        </tr>
                        <tr>
                            <td>Costo</td>
                            <td><input type='number' step='.01' name='cost_price' class='form-control' value='<?php echo $item_obj["cost_price"]; ?>'/></td>
                        </tr>
                        <tr>
                            <td>Precio Unitario</td>
                            <td><input type='number' step='.01' name='unit_price' class='form-control' value='<?php echo $item_obj["unit_price"]; ?>'/></td>
                        </tr>
                        <tr>
                            <td>Imagen</td>
                            <td><input type='file' name='picture'></td>
                        </tr>
                        <input type="hidden" name="default_picture" value="<?php echo $item_obj['pic_filename']; ?>">
                        <tr>
                            <td></td>
                            <td>
                                <input type='submit' value='Guardar' class='btn btn-primary'/>
                                <a href='/' class='btn btn-danger'>Volver</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
          
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
           
        <!-- Latest compiled and minified Bootstrap JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
</html>