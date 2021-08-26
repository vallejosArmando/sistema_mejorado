<?php
class Loginn{
    private $db;
   
    public function __construct()
    {
$this->db=new Base;
    }
public function inicio($nom_usuario,$clave){
// Recepción de los datos enviados mediante POST desde el JS   


$this->db->query("SELECT us.id as id_usuario, us.nom_usuario as nom_usuario, us.clave as clave, r.id as id_rol, r.rol as rol FROM usuario_rol usr INNER JOIN rol r ON usr.id_rol = r.id INNER JOIN usuario us on us.id=usr.id_usuario WHERE nom_usuario=:nom_usuario AND clave=:pass ");	
$this->db->bind(':nom_usuario',$nom_usuario);
$this->db->bind(':pass',md5($clave));
$this->db->execute();
$this->db->execute(); 


if($this->db->rowCount() >= 1){ 
    $data=$this->db->registros();    
    $_SESSION["s_usuario"] = $nom_usuario;    
    $_SESSION["s_id_usuario"] = $data[0]["id_usuario"];
    $_SESSION["s_id_rol"] = $data[0]["id_rol"];
    $_SESSION["s_rol"] = $data[0]["rol"];
    return true;
}else{
    $_SESSION["s_usuario"] = null;  
    $data=null;
}


}

}