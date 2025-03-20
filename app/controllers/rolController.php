<?php
namespace App\Controllers;
use App\Models\RolModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/RolModel.php";

class RolController extends BaseController {
    public function __construct() {
        $this->layout = "admin_layout";
        parent::__construct();
    }
    public function view() {
        $rolModel = new RolModel();
        $roles = $rolModel->getAll();
        $this->render('rol/viewRol.php', ["roles" => $roles, "titulo" => "Lista de Roles"]);
    }
}
