
        <?php require RUTA_APP .'/views/include/header.php'; ?><?php require RUTA_APP . '/views/include/menu.php'; ?>

<div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Editar<small>Editar Sitema</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="<?php echo RUTA_URL ?>/tipos/editar/<?php echo $datos['id'];?>" id="formulario_tipo" method="POST" enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $datos['nombre'];?>" placeholder="Ingrese nombre ">
                  </div>
                  <div class="form-group">
                    <label for="descripcion">Nombre del Creador</label>
                    <input type="text" name="descripcion" class="form-control" id="descripcion" value="<?php echo $datos['descripcion'];?>" placeholder="descripcion">
                  </div>
            
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                <input type="submit" class="btn btn-primary" value="editar">
                <a href="<?php echo RUTA_URL?>/tipos" class="btn btn-dark ">Cancelar</a> 
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