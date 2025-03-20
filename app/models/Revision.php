<?php

use App\Models\BaseModel;

class RevisionModel extends BaseModel {
    public function __construct() {
        $this->table = "revision";
        parent::__construct();
    }
    public function getAll(): array {
        return $this->fetchAll("SELECT * FROM {$this->table}");
    }
}