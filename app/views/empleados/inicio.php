
<?php require RUTA_APP . '/views/include/header.php'; ?>
<?php require RUTA_APP . '/views/include/menu.php'; ?>

<!-- Info boxes -->
<div class="card">
  
      <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
      </div>
      <div class="card-header">
      <td> <a href="<?php echo RUTA_URL?>/empleados/agregar" class="btn btn-primary" >Agregar</a> </td>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Tipo empleado</th>
            <th>Area</th>
            <th>Nombre</th>
            <th>Ap. paterno</th>
            <th>Ap. materno</th>
            <th>Cedula</th>
            <th>Telefono</th>
            <th>Tel. celular</th>
            <th>Direccion</th>
            <th>Editar</th>
            <th>Eliminar</th>

          </tr>
          </thead>
          <tbody>
<?php  foreach ($datos['empleado']as $data):?>


<tr>
<td><?php echo $data->id; ?></td>
<td><?php echo $data->id_tipo; ?></td>
<td><?php echo $data->id_area; ?></td>
<td><?php echo $data->nombres; ?></td>
<td><?php echo $data->ap; ?></td>
<td><?php echo $data->am; ?></td>
<td><?php echo $data->ci; ?></td>
<td><?php echo $data->tel_fijo; ?></td>
<td><?php echo $data->tel_cel; ?></td>
<td><?php echo $data->direccion; ?></td>
<td> <a href="<?php echo RUTA_URL; ?>/empleados/editar/<?php echo $data->id;?>" class="btn btn-success" ><i class="nav-icon fas fa-edit"></i></a></td>
<td> <a href="<?php echo RUTA_URL; ?>/empleados/borrar/<?php echo $data->id;?>" class="btn btn-danger" ><i class="fas fa-trash-alt"></i></a></td>
</tr>
<?php endforeach;?>

</tbody>
          <tfoot>
          <tr>
          <th>ID</th>
          <th>Tipo empleado</th>
          <th>Area</th>
          <th>Nombre</th>
          <th>Ap. paterno</th>
          <th>Ap. materno</th>
          <th>Cedula</th>
          <th>Telefono</th>
          <th>Tel. celular</th>
          <th>Direccion</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <?php require RUTA_APP . '/views/include/footer.php'; ?>
