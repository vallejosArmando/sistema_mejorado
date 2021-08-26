<?php
class Persona
{
  private $db;
  public function __construct()
  {
    $this->db = new Base;
  }
  public function listar()
  {
    $this->db->query('SELECT *FROM persona WHERE estado  = 1');
    return $this->db->registros();
  }

  public function optenerId($id)
  {
    $this->db->query('SELECT * FROM persona WHERE id=:id');
    $this->db->bind(':id', $id);
    $fila = $this->db->registro();
    return $fila;
  }

  public function insertar($datos)
  {
    // insertar
    $this->db->query('INSERT INTO persona (id, id_sistema, ci,  nombres, ap, am,  telefono, direccion,genero, fec_insercion, fec_modificacion, usuario, estado) VALUES (null,1, :ci,  :nombres, :ap, :am, :telefono,:direccion,:genero,now(),now(),1,1)');


    $this->db->bind(':ci', $datos['ci']);
    $this->db->bind(':nombres', $datos['nombres']);
    $this->db->bind(':ap', $datos['ap']);
    $this->db->bind(':am', $datos['am']);
    $this->db->bind(':telefono', $datos['telefono']);
    $this->db->bind(':direccion', $datos['direccion']);
    $this->db->bind(':genero', $datos['genero']);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function actualizar($datos)
  {
    // insertar
    $this->db->query('UPDATE persona SET  ci=:ci, nombres=:nombres, ap=:ap, am=:am, telefono=:telefono, direccion=:direccion , genero=:genero WHERE id=:id');

    $this->db->bind(':id', $datos['id']);
    $this->db->bind(':ci', $datos['ci']);
    $this->db->bind(':nombres', $datos['nombres']);
    $this->db->bind(':ap', $datos['ap']);
    $this->db->bind(':am', $datos['am']);
    $this->db->bind(':telefono', $datos['telefono']);
    $this->db->bind(':direccion', $datos['direccion']);
    $this->db->bind(':genero', $datos['genero']);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function Eliminar($datos)
  {

    $this->db->query('UPDATE persona SET estado=0 AND id=:id');
    $this->db->bind(':id', $datos['id']);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
