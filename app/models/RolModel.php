<?php

namespace App\Models;

class RolModel extends BaseModel {
    public function __construct() {
        $this->table = "rol";
        parent::__construct();
    }
    public function getAll(): array {
        return $this->fetchAll("SELECT * FROM {$this->table}");
    }
}