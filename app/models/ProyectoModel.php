<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class ProyectoModel extends BaseModel{
    public function __construct(
        ?int $id = null,
        ?string $nombre = null,
    )
    {
        $this->table = "proyecto";
        parent::__construct();
    }

    public function getAll(): array {
        try {
            $sql = "SELECT idProyecto, nombre FROM {$this->table}";
            $statement = $this->dbConnection->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo "Error al obtener proyectos: ".$ex->getMessage();
            return [];
        }
    }

    public function saveProyecto(string $nombre): bool {
        try {
            $sql = "INSERT INTO {$this->table} (nombre) VALUES (:nombre)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->execute();
            return true;
        } catch (PDOException $ex) {
            echo "Error al guardar el proyecto: ".$ex->getMessage();
            return false;
        }
    }

    public function getProyecto(int $idProyecto): ?object {
        try {
            $sql = "SELECT idProyecto, nombre FROM {$this->table} WHERE idProyecto = :idProyecto";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":idProyecto", $idProyecto, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return !empty($result) ? $result[0] : null;
        } catch (PDOException $ex) {
            echo "Error al obtener proyecto: ".$ex->getMessage();
            return null;
        }
    }

    public function editProyecto(int $idProyecto, string $nombre): bool {
        try {
            $sql = "UPDATE {$this->table} SET nombre = :nombre WHERE idProyecto = :idProyecto";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":idProyecto", $idProyecto, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo editar el proyecto: ".$ex->getMessage();
            return false;
        }
    }

    public function deleteProyecto(int $idProyecto): bool {
        try {
            $sql = "DELETE FROM {$this->table} WHERE idProyecto = :idProyecto";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":idProyecto", $idProyecto, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el proyecto: ".$ex->getMessage();
            return false;
        }
    }
}