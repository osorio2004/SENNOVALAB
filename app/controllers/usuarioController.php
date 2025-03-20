<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE . "../models/UsuarioModel.php";

class UsuarioController extends BaseController
{
    public function __construct()
    {
        $this->layout = "admin_layout";
        parent::__construct();
    }

    public function index()
    {
        echo "<br>CONTROLLER> UsuarioController";
        echo "<br>ACTION> index";
    }

    public function newUsuario()
    {
        $this->render('usuario/newUsuario.php', ["titulo" => "Registrar usuario"]);
    }

    public function createUsuario()
    {
        if (isset($_POST["nombre"], $_POST["apellido"], $_POST["correoElectronico"], $_POST["contraseña"], $_POST["idRol"])) {
            var_dump($_POST);
            exit;

            $nombre = $_POST["nombre"] ?? null;
            $apellido = $_POST["apellido"] ?? null;
            $correoElectronico = $_POST["correoElectronico"] ?? null;
            $contraseña = password_hash($_POST["contraseña"], PASSWORD_DEFAULT); // Encriptar la contraseña
            $idRol = $_POST["idRol"] ?? null;

            $usuarioObj = new UsuarioModel();
            $usuarioObj->saveUsuario($nombre, $apellido, $correoElectronico, $contraseña, $idRol);

            $this->redirectTo("usuario/view");
        } else {
            echo "Faltan datos para registrar el usuario.";
        }
    }


    public function viewUsuario($idUsuario)
    {
        $usuarioObj = new UsuarioModel();
        $usuarioInfo = $usuarioObj->getUsuario($idUsuario);

        if (!$usuarioInfo) {
            echo "Usuario no encontrado.";
            return;
        }

        $data = [
            "usuario" => $usuarioInfo,
            "titulo" => "Vista del usuario: " . $usuarioInfo->nombre
        ];

        $this->render("usuario/viewUsuario.php", $data);
    }

    public function view()
    {
        $usuarioModel = new UsuarioModel();
        $usuarios = $usuarioModel->getAll();
        $this->render('usuario/viewUsuario.php', ["usuarios" => $usuarios, "titulo" => "Lista de Usuarios"]);
    }

    public function deleteUsuario($idUsuario)
    {
        $usuarioObj = new UsuarioModel();
        $usuarioObj->deleteUsuario($idUsuario);
        $this->redirectTo("usuario/view");
    }
}
