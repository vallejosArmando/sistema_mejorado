<?php 
class Usuario  {
private $db;
    public function __construct() {
$this->db=new Base;

       if (isset($_SESSION["s_usuario"] )){
       }

    }
    public function login($data){

        $this->db->query(" SELECT us.id as id_usuario, us.nom_usuario as nom_usuario, us.clave as clave, r.id as id_rol, r.rol as rol FROM usuario_rol usr INNER JOIN rol r ON usr.id_rol = r.id INNER JOIN usuario us on us.id=usr.id_usuario WHERE nom_usuario=:nom_usuario AND clave=:pass");
        $this->db->bind(':nom_usuario',$data['nom_usuario']);
        $this->db->bind(':pass',md5($data['clave']));
        return (  $this->db->registro()); 
    

    }

   

public function listar(){

$this->db->query('SELECT * FROM usuario   WHERE estado=1
');
return $this->db->registros();

}
public function listarPersona(){
    $this->db->query('SELECT * FROM personas WHERE estado = 1');
    return $this->db->registros();

}

public function optenerId($id){
    $this->db->query('SELECT * FROM usuario WHERE estado =1 AND id=:id');
    $this->db->bind(':id',$id);
    $fila=$this->db->registro();
    return $fila;

}
public function insertar($datos){
    $this->db->query('INSERT INTO `usuario`(`id`, `id_persona`, `nom_usuario`, `clave`, `fec_insercion`, `fec_modificacion`, `usuario`, `estado`) VALUES (null,:id_persona,:nom_usuario,:clave,now(),now(),1,1)');
    $this->db->bind(':id_persona',$datos['id_persona']);
$this->db->bind(':nom_usuario',$datos['nom_usuario']);
$this->db->bind(':clave',$datos['clave']);
if($this->db->execute()){
    return true;
}else{
    return false;
}
}
public function actualizar($datos){
    $this->db->query('UPDATE usuario SET  id_persona=:id_persona, nom_usuario=:nom_usuario, clave=:clave WHERE id=:id ');
    $this->db->bind(':id',$datos['id']);
    $this->db->bind(':id_persona',$datos['id_persona']);
$this->db->bind(':nom_usuario',$datos['nom_usuario']);
$this->db->bind(':clave',$datos['clave']);
if($this->db->execute()){
    return true;
}else{
    return false;
}

}
public function eliminar($datos){
    $this->db->query('UPDATE usuario SET  estado=0 WHERE id=:id ');
    $this->db->bind(':id',$datos['id']);
  
if($this->db->execute()){
    return true;
}else{
    return false;
}


}

}



?>