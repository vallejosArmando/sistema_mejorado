<?php
class User extends Controlador {
    private $user;
    public function __construct() {
        $this->user = $this->modelo('Usuario');
    }

    
    public function index() {
        $data = [
            'title' => 'Login page',
            'nom_usuario' => '',
            'clave' => '',
            'nombreError' => '',
            'claveError' => ''
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
         

            $data = [
                'nom_usuario' => trim($_POST['nom_usuario']),
                'clave' => trim($_POST['clave']),
                'nombreError' => '',
                'claveError' => '',
            ];
            //Validate nom_usuario
            if (empty($data['nom_usuario'])) {
                $data['nombreError'] = 'Please enter a nom_usuario.';
            }

            //Validate clave
            if (empty($data['clave'])) {
                $data['claveError'] = 'Please enter a clave.';
            }

            //Check if all errors are empty
            if (empty($data['nombreError']) && empty($data['claveError'])) {
                $usuario = $this->user->login($data);

                if ($usuario) {
                    $this->createUserSession($usuario);
                } else {
                    $_SESSION['error']= $data['claveError'] = 'Password or nom_usuario is incorrect. Please try again.';

                    $this->vista('usuarios/login', $data);
                }
            }

        } else {
            $data = [
                'nom_usuario' => '',
                'clave' => '',
                'nombreError' => '',
                'claveError' => ''
            ];
        }
        $this->vista('usuarios/login', $data);
    }

    public function createUserSession($usuario) {
        session_start();
        $_SESSION["s_usuario"] = $usuario->nom_usuario;
                $_SESSION["s_id_usuario"] = $usuario->id_usuario;
                $_SESSION["s_id_rol"] = $usuario->id_rol;
                $_SESSION["s_rol"] = $usuario->rol;
        redireccionar('/menus');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['nom_usuario']);
        unset($_SESSION['email']);
        redireccionar('/usuarios/login');
    }
}
