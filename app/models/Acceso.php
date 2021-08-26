<?php 
class Acceso {
    private $db;
    public function __construct(){
  $this->db=new Base;
  
    }
public function listar(){
  //$this->db->query('SELECT *FROM acceso //WHERE estado  = 1');
 // return $this->db->registros();
 $this->db->query("SELECT gr.grupo as grupo FROM acceso acc INNER JOIN grupo gr ON gr.id=acc.id_grupo INNER JOIN opcion op ON acc.id_opcion=op.id WHERE op.id_grupo=acc.id_grupo AND gr.id=acc.id_grupo AND op.id_grupo=gr.id ORDER BY gr.id");
 return $this->db->registros();

}

public function listarGrupo(){
  $this->db->query('SELECT *FROM grupos WHERE estado  = 1');
  return $this->db->registros();

}
public function listarOpcion(){
  $this->db->query('SELECT *FROM opcion WHERE estado  = 1');
  return $this->db->registros();

}
public function listarRol(){
  $this->db->query('SELECT *FROM rol WHERE estado  = 1');
  return $this->db->registros();

}
public function optenerId($id)
{
 $this->db->query('SELECT * FROM acceso WHERE id=:id');
 $this->db->bind(':id',$id);
 $fila=$this->db->registro();
 return $fila;
      
}
public function insertar($datos){
  // insertar
   $this->db->query('INSERT INTO acceso(id, id_grupo, id_opcion, id_rol, permisos, fec_insercion, fec_modificacion, usuario, estado) VALUES (null,:id_grupo,:id_opcion,:id_rol,:permisos,now(),now(),1,1)');
   
  
    $this->db->bind(':id_grupo',$datos['id_grupo']);
    $this->db->bind(':id_opcion',$datos['id_opcion']);
    $this->db->bind(':id_rol',$datos['id_rol']);
    $this->db->bind('permisos',$datos['permisos']);
 
    
    if($this->db->execute()){
      return true;
    }else{
      return false;
    }

  


}
public function actualizar($datos){
  // insertar
  $this->db->query('UPDATE acceso SET  id_grupo=:id_grupo, id_opcion=:id_opcion, id_rol=:id_rol, permisos=:permisos WHERE id=:id');
   
  $this->db->bind(':id',$datos['id']);

  $this->db->bind(':id_grupo',$datos['id_grupo']);
  $this->db->bind(':id_opcion',$datos['id_opcion']);
  $this->db->bind(':id_rol',$datos['id_rol']);
  $this->db->bind(':permisos',$datos['permisos']);

  
  if($this->db->execute()){
    return true;
  }else{
    return false;
  }

}
public function Eliminar($datos){
  $this->db->query('UPDATE acceso SET estado=0 WHERE id=:id');
  $this->db->bind(':id',$datos['id']);
  if($this->db->execute()){
    return true;

  }else{
    return false;
  }

}
public function permisos($datos){
  $this->db->query('SELECT permisos FROM acceso WHERE id_opcion=:id_opcion AND id_rol=:id_rol');
  $this->db->bind(':id_opcion',$datos['id_opcion']);
  $this->db->bind(':id_rol',$datos['id_rol']);
    
  if($this->db->registros()){
    return true;
  }else{
    return false;
  }
}
public function acceso($id_rol,$opcion,$grupo){
  $this->db->query("SELECT * FROM acceso acc INNER JOIN opcion op ON acc.id_opcion=op.id INNER JOIN rol r ON acc.id_rol=r.id INNER JOIN grupo gr ON  acc.id_grupo=gr.id WHERE acc.permisos='a' AND op.mostrar='si' AND acc.id_opcion=:id_opcion AND acc.id_rol=:id AND acc.id_grupo=:id_grupo ");

  $this->db->bind(':id_opcion',$opcion);
  $this->db->bind(':id',$id_rol);
  $this->db->bind(':id_grupo',$grupo);

  return $this->db->registros();

}
public function opcion($id_grupo){ 
  ///get the sub menu id 
  $this->db->query("SELECT * FROM opcion op INNER JOIN acceso acc ON op.id=acc.id_opcion INNER JOIN grupos gr ON op.id_grupo=gr.id WHERE op.id_grupo=:id_grupo and acc.permisos='a' ");
  $this->db->bind(':id_grupo',$id_grupo);

    
   return $this->db->registros();
}
}
?>