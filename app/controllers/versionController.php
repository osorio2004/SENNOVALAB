<?php
namespace App\Controllers;
use App\Models\VersionModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/VersionModel.php";

class VersionController extends BaseController {
    public function __construct() {
        $this->layout = "admin_layout";
        parent::__construct();
    }
    public function view() {
        $versionModel = new VersionModel();
        $versiones = $versionModel->getAll();
        $this->render('version/viewVersion.php', ["versiones" => $versiones, "titulo" => "Lista de Versiones"]);
    }
}