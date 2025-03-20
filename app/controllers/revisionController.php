<?php
namespace App\Controllers;
use RevisionModel as GlobalRevisionModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/RevisionModel.php";

class RevisionController extends BaseController {
    public function __construct() {
        $this->layout = "admin_layout";
        parent::__construct();
    }
    public function view() {
        $revisionModel = new GlobalRevisionModel();
        $revisiones = $revisionModel->getAll();
        $this->render('revision/viewRevision.php', ["revisiones" => $revisiones, "titulo" => "Lista de Revisiones"]);
    }
}