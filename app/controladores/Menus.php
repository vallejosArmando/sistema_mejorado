<?php

class Menus extends Controlador
{
    private $opcion;
    private $grupo;
    private $acceso;
    public function __construct()
    {
        $this->grupo = $this->modelo('Grupo');
        $this->acceso = $this->modelo('Acceso');
        $this->opcion = $this->modelo('Opcion');
    
        //echo 'pagina controlador cargada';
    }
    public function index()
    {
        $opcion = $this->opcion->listar();
        $acc = $this->acceso->listar();
        $grupos = $this->grupo->listar();
        $datos = [
            'grupos' => $grupos,
            'opciones' => $opcion,
            'acceso' => $acc,

        ];
        $this->vista('menus/inicio', $datos);
    }
}
