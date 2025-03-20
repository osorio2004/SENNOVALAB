<?php
namespace App\Controllers;
use App\Models\TipoUsuarioGymModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/TipoUsuarioSENNOVA.php";

class TipoUsuarioController extends BaseController{
    public function __construct(){
        //Se define la plantilla para este controlador
        $this->layout = "admin_layout";
        //Llamamos al contructor del padre
        parent::__construct();
    }
    public function index(){
        echo "<br>CONTROLLER> TipoUsuarioController";
        echo "<br>ACTION> index";
    }
    
    public function view(){
        $tipoUsuarioObj = new TipoUsuarioGymModel();
        $tipoUsuarios = $tipoUsuarioObj->getAll();
        $data = [
            "tipoUsuarios"=>$tipoUsuarios,
            "titulo" => "Lista de tipo de usuarios"
        ];
        $this->render('tipoUsuario/viewTipoUsuario.php', $data);
    }

    public function newTipoUsuario(){
        $this->render('tipoUsuario/newTipoUsuario.php', ["titulo" => "Nuevo tipo de usuario"]);
    }

    public function createTipoUsuario(){
        if (isset($_POST["txtNombre"])) {
            $nombre = $_POST["txtNombre"] ?? null;
            $tipoUsuarioObj = new TipoUsuarioGymModel();
            $tipoUsuarioObj->saveTipoUsuario($nombre);
            $this->redirectTo("tipoUsuario/view");
        }
    }

    public function viewTipoUsuario($id){
        $tipoUsuarioObj = new TipoUsuarioGymModel();
        $tipoUsuarioInfo = $tipoUsuarioObj->getTipoUsuario($id);
        $data = [
            "tipoUsuario" => $tipoUsuarioInfo,
            "titulo" => "Vista de un tipo de usuario"
        ];
        $this->render("tipoUsuario/viewOneTipoUsuario.php", $data);
    }

    public function editTipoUsuario($id){
        $tipoUsuarioObj = new TipoUsuarioGymModel();
        $tipoUsuarioInfo = $tipoUsuarioObj->getTipoUsuario($id);
        $data = [
            "tipoUsuario" => $tipoUsuarioInfo,
            "titulo" => "Editar usuario"
        ];
         $this->render("tipoUsuario/editTipoUsuario.php", $data);
    }

    public function updateTipoUsuario(){
        if (isset($_POST["txtNombre"])) {
            $id = $_POST["txtId"] ?? null;
            $nombre = $_POST["txtNombre"] ?? null;
            $tipoUsuarioObj = new TipoUsuarioGymModel();
            $tipoUsuarioObj->editTipoUsuario($id, $nombre);
        }
        $this->redirectTo("tipoUsuario/view");
    }

    public function deleteTipoUsuario($id){
        $tipoUsuarioObj = new TipoUsuarioGymModel();
        $tipoUsuarioObj->deleteTipoUsuario($id);
        $this->redirectTo("tipoUsuario/view");
    }
}