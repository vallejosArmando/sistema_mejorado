

<?php
 class Menu{
private $db;

  public function __construct(){
$this->db= new Base;

  }

public function opcion($id_grupo){ 
  ///get the sub menu id 
  $this->db->query("SELECT * FROM opcion op INNER JOIN acceso acc ON op.id=acc.id_opcion INNER JOIN grupo gr ON op.id_grupo=gr.id WHERE op.id_grupo=:id_grupo and acc.permisos='a' ");
  $this->db->bind(':id_grupo',$id_grupo);

    
   return $this->db->registros();
  
}
public function opcionMenu($id_grupo){ 
  ///get the sub menu id 

  $this->db->query("SELECT * FROM opcion op
  INNER JOIN acceso acc ON acc.id_opcion=op.id INNER JOIN grupo gr ON op.id_grupo=gr.id
where op.estado=1 AND op.id_grupo=:id AND op.mostrar='si' AND acc.permisos='a' order by gr.id ");
  $this->db->bind(':id',$id_grupo);

  return $this->db->registros();
  
}

  public function permiso($id_opcion){
  $this->db->query("SELECT permisos FROM acceso WHERE id_opcion=:id_opcion AND id_rol=1");
  $this->db->bind(':id_opcion',$id_opcion);
  return $this->db->registros();
  
  }
  public function grupo(){
  $this->db->query("SELECT *FROM grupo WHERE estado=1");
  return $this->db->registros();
  }
  public function acceso($id_opcion){
    $this->db->query("SELECT  * FROM acceso acc INNER JOIN opcion op ON acc.id_opcion=op.id INNER JOIN roles r ON acc.id_rol=r.id WHERE acc.permisos='a' AND op.mostrar='si' AND acc.id_opcion=:id_opcion AND acc.id_rol=1 ");
    $this->db->bind(':id_opcion',$id_opcion);
    return $this->db->registros();

  }
  public function opciones($id_grupo){
    
  $this->db->query("SELECT * FROM opcion 
  inner join acceso on acceso.id_opcion=opcion.id
where opcion.estado='1' AND opcion.id_grupo=:id_grupo AND opcion.mostrar='si' AND acceso.permisos='a' AND acceso.id_rol=1 order by orden asc");
$this->db->bind(':id_grupo',$id_grupo);
return  $this->db->registros();

  }}
  
  ?>
  