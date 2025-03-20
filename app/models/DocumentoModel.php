<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class DocumentoModel extends BaseModel {
    public function __construct() {
        $this->table = "documento";
        parent::__construct();
    }
    public function getAll(): array {
        return $this->fetchAll("SELECT * FROM {$this->table}");
    }
}