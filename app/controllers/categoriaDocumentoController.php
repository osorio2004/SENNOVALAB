<?php
namespace App\Controllers;
use App\Models\CategoriaDocumentoModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/CategoriaDocumentoModel.php";

class CategoriaDocumentoController extends BaseController {
    public function __construct() {
        $this->layout = "admin_layout";
        parent::__construct();
    }
    public function view() {
        $categoriaModel = new CategoriaDocumentoModel();
        $categorias = $categoriaModel->getAll();
        $this->render('categoria/viewCategoria.php', ["categorias" => $categorias, "titulo" => "Lista de Categorías"]);
    }
}
