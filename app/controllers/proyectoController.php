<?php
namespace App\Controllers;
use App\Models\ProyectoModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/ProyectoModel.php";

class ProyectoController extends BaseController{
    public function __construct(){
        //Se define la plantilla para este controlador
        $this->layout = "admin_layout";
        //Llamamos al contructor del padre
        parent::__construct();
    }
    
    public function index(){
        echo "<br>CONTROLLER> ProyectoController";
        echo "<br>ACTION> index";
        // $this->render();
    }     
    
    public function view(){
        //LLamamos al modelo de Proyecto
        $proyectoObj = new ProyectoModel();
        $proyectos = $proyectoObj->getAll();
        //LLamamos a la vista
        $data = [
            "proyectos" => $proyectos,
            "titulo" => "Lista de proyectos"
        ];
        $this->render('proyecto/viewProyecto.php', $data);
    }

    public function newProyecto(){
        $this->render('proyecto/newProyecto.php', ["titulo" => "Nuevo proyecto"]);
    }

    public function createProyecto(){
        if (isset($_POST["txtNombre"])) {
            $nombre = $_POST["txtNombre"] ?? null;
            //Creamos instancia del modelo proyecto
            $proyectoObj = new ProyectoModel();
            $proyectoObj->saveProyecto($nombre);
            $this->redirectTo("proyecto/view");
        }
    }

    public function viewProyecto($id){
        $proyectoObj = new ProyectoModel();
        $proyectoInfo = $proyectoObj->getProyecto($id);
        $data = [
            "proyecto" => $proyectoInfo,
            "titulo" => "Ver un proyecto"
        ];
        $this->render("proyecto/viewOneProyecto.php", $data);
    }

    public function editProyecto($id){
        $proyectoObj = new ProyectoModel();
        $proyectoInfo = $proyectoObj->getProyecto($id);
        $data = [
            "proyecto" => $proyectoInfo,
            "titulo" => "Editar proyecto"
        ];
        $this->render("proyecto/editProyecto.php", $data);
    }

    public function updateProyecto(){
        if (isset($_POST["txtNombre"])) {
            $id = $_POST["txtId"] ?? null;
            $nombre = $_POST["txtNombre"] ?? null;
            $proyectoObj = new ProyectoModel();
            $proyectoObj->editProyecto($id, $nombre);
        }
        $this->redirectTo("proyecto/view");
    }

    public function deleteProyecto($id){
        $proyectoObj = new ProyectoModel();
        $proyectoObj->deleteProyecto($id);
        $this->redirectTo("proyecto/view");
    }
}