<?php 
class Opcion {
    private $db;
    public function __construct(){
  $this->db=new Base;
    }
public function listar(){
$this->db->query("SELECT * FROM opcion op INNER JOIN grupo gr ON gr.id=op.id_grupo WHERE op.id_grupo=gr.id AND op.estado=1 AND op.mostrar='si'");
return $this->db->registros();
}
public function opcion($grupo){ 
  ///get the sub menu id 
  $this->db->query("SELECT op.op_url as op_url , op.nombre as nombre, op.id_grupo as id_grupo  FROM opcion op INNER JOIN acceso acc ON op.id=acc.id_opcion INNER JOIN grupo gr ON op.id_grupo=gr.id WHERE op.id_grupo=:id_grupo and acc.permisos='a' and op.mostrar='si' and op.estado=1 ");
  $this->db->bind(':id_grupo',$grupo);

    
   return $this->db->registros();
  
}
public function opcionn($dato){ 
  ///get the sub menu id 
  $this->db->query("SELECT * FROM opcion op INNER JOIN acceso acc ON acc.id_opcion=op.id INNER JOIN grupo gr ON op.id_grupo=gr.id and op.id_grupo=:id_grupo ");
  $this->db->bind(':id_grupo',$dato);

  return $this->db->registros();
  
}
public function listarGrupo(){
    $this->db->query("SELECT * FROM grupo WHERE estado =1");
    return $this->db->registros();
    }
public function insertar($datos){
  // insertar
  
  $this->db->query('INSERT INTO opcion(id, id_grupo, nombre, op_url,mostrar,orden, fec_insercion, fec_modificacion, usuario, estado) VALUES (null,:id_grupo,:nombre,:op_url, :mostrar, :orden ,now(),now(),1,1)');
  $this->db->bind(':id_grupo',$datos['id_grupo']);

   $this->db->bind(':nombre',$datos['nombre']);

   $this->db->bind(':op_url',$datos['op_url']);
   $this->db->bind(':mostrar',$datos['mostrar']);
   $this->db->bind(':orden',$datos['orden']);

   if($this->db->execute()){
     return true;

   }else {

  return true;
}
}
public function optenerId($id){
  $this->db->query('SELECT *FROM opcion WHERE id=:id');
  $this->db->bind(':id',$id);
  $fila=$this->db->registro();
  return $fila;
}
public function actualizar($datos){
  $this->db->query('UPDATE opcion SET id_grupo=:id_grupo,nombre=:nombre,op_url=:op_url ,mostrar=:mostrar , orden=:orden WHERE id=:id ' );
  $this->db->bind(':id',$datos['id']);

  $this->db->bind(':id_grupo',$datos['id_grupo']);

   $this->db->bind(':nombre',$datos['nombre']);

   $this->db->bind(':op_url',$datos['op_url']);
   $this->db->bind(':mostrar',$datos['mostrar']);
   $this->db->bind(':orden',$datos['orden']);

  if($this->db->execute()){
    return true;


  }else{
    return false;
  }

}
public function eliminar($datos){
  $this->db->query('UPDATE opcion SET estado=0  WHERE id=:id ' );

  $this->db->bind(':id',$datos['id']);

  if($this->db->execute()){
    return true;
  }else{
    return false;
  }

}

}
?>