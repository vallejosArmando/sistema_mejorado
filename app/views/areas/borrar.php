
        <?php require RUTA_APP .'/views/include/header.php'; ?><?php require RUTA_APP . '/views/include/menu.php'; ?>

<div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Eliminar<small>Eliminar Area</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="<?php echo RUTA_URL ?>/areas/borrar/<?php echo $datos['id'];?>" id="formulario_area" method="POST" enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $datos['nombre'];?>" >
                  </div>
                  <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" class="form-control" id="descripcion" value="<?php echo $datos['descripcion'];?>" >
                  </div>
              
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                <input type="submit" class="btn btn-danger" value="Eliminar">
                <a href="<?php echo RUTA_URL?>/areas" class="btn btn-dark ">Cancelar</a> 

                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <?php require RUTA_APP .'/views/include/footer.php'; ?>