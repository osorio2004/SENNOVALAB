<?php
namespace App\Controllers;

use App\Models\UsuarioModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE . "../models/UsuarioModel.php";

class RegisterController extends BaseController {
    public function __construct() {
        $this->layout = "login_layout"; // Usar el layout de login
    }

    public function newUsuario() {
        $this->render('usuario/newUsuario.php', ["titulo" => "Registrar usuario"]);
    }

    public function createUsuario() {
        if (isset($_POST["nombre"], $_POST["apellido"], $_POST["correoElectronico"], $_POST["contraseña"], $_POST["idRol"])) {
            $nombre = $_POST["nombre"] ?? null;
            $apellido = $_POST["apellido"] ?? null;
            $correoElectronico = $_POST["correoElectronico"] ?? null;
            $contraseña = password_hash($_POST["contraseña"], PASSWORD_DEFAULT); // Encriptar la contraseña
            $idRol = $_POST["idRol"] ?? null;

            // Crear una instancia del modelo Usuario
            $usuarioObj = new UsuarioModel();
            
            // Guardar el usuario con los datos correctos
            $usuarioObj->saveUsuario($nombre, $apellido, $correoElectronico, $contraseña, $idRol);
            
            // Redirigir a la vista de login después de registrar
            $this->redirectTo("login/init");
        } else {
            $errors = "Todos los campos son obligatorios.";
            $data = [
                "errors" => $errors,
            ];
            $this->render("usuario/newUsuario.php", $data);
        }
    }
}
