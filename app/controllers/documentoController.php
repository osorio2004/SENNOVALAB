<?php
namespace App\Controllers;
use App\Models\DocumentoModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/DocumentoModel.php";

class DocumentoController extends BaseController {
    public function __construct() {
        $this->layout = "admin_layout";
        parent::__construct();
    }
    public function view() {
        $documentoModel = new DocumentoModel();
        $documentos = $documentoModel->getAll();
        $this->render('documento/viewDocumento.php', ["documentos" => $documentos, "titulo" => "Lista de Documentos"]);
    }
}