<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class CategoriaDocumentoModel extends BaseModel {
    public function __construct() {
        $this->table = "categoriadocumento";
        parent::__construct();
    }
    public function getAll(): array {
        return $this->fetchAll("SELECT * FROM {$this->table}");
    }
    public function save(string $nombre, string $descripcion): bool {
        return $this->execute("INSERT INTO {$this->table} (nombre, descripcion) VALUES (?, ?)", [$nombre, $descripcion]);
    }
}