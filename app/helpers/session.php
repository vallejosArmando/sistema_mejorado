<?php
    session_start();

    function session_rol() {
        if (isset($_SESSION['s_usuario']  ) ) {
            return true;
        } else {
            return false;
        }
    }
