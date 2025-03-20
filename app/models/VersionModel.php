<?php

namespace App\Models;

class VersionModel extends BaseModel {
    public function __construct() {
        $this->table = "version";
        parent::__construct();
    }
    public function getAll(): array {
        return $this->fetchAll("SELECT * FROM {$this->table}");
    }
}