<?php
namespace App\Controllers;
use App\models\UsuarioModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/UsuarioModel.php";


class LoginController extends BaseController{
    public function __construct() {
        $this->layout = "login_layout";
    }
    public function initLogin(){
        if (isset($_POST["txtUser"]) && isset($_POST["txtPassword"])) {
            $user = trim($_POST["txtUser"]) ?? null;
            $password = trim($_POST["txtPassword"]) ?? null;
            if ($user != null && $password != null) {
                //se valida la existencia del usuario y contraseña en la BD
                $loginObj = new UsuarioModel();
                $resp = $loginObj->validarLogin($user, $password);
                if ($resp) {
                    $this->redirectTo("proyecto/view");
                    exit();
                }else{
                    $errors = "El usuario y/o contraseña son incorrectos";

                }
            }else{
                $errors = "El usuario y/o contraseña no pueden ser vacíos";
            }
            $data = [
                "errors" => $errors,
            ];
            $this->render("login/login.php", $data);
        }else{
            //Se renderiza el formulario del login
            $this->render("login/login.php");
        }

    }

    public function testBcrypt(){
        $passwordFormulario = "123456"; //Contraseña que llega del form de creación        
        /* $options = ["const" => 31];
        $hashedPassword = password_hash($passwordFormulario, PASSWORD_BCRYPT, $options); */
        $passHashed = password_hash($passwordFormulario, PASSWORD_DEFAULT);
        //echo "<br>Hash password PASSWORD_BCRYPT: $hashedPassword";
        echo "Hash del password PASSWORD_DEFAULT: $passHashed<br>";

        ############################
        //Formulario para inicio de sesión
        $passwordFormulario = "123456";
        if (password_verify($passwordFormulario, $passHashed)) {
            echo "<br>Usuario logeado correctamente";
        }else{
            echo "<br>Usuario y/o contraseñas son incorrectos";
        }
    }

    public function logoutLogin(){
        session_destroy();
        header("Location: /login/init");
    }
}