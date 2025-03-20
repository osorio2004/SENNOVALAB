<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class TipoUsuarioGymModel extends BaseModel{
    public function __construct(
        ?int $id = null,
        ?string $nombre = null,
    )
    {
        $this->table = "tipousuariogym";
        //Se llama a el contructor de el padre
        parent::__construct();
    }

    public function saveTipoUsuario($nombre){
        try {
            $sql = "INSERT INTO $this->table (nombre) VALUES (:nombre)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar el tipo de usuario: ".$ex->getMessage();
        }
    }

    public function getTipoUsuario($id){
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener tipo de usuario: ".$ex->getMessage();
        }
    }

    public function editTipoUsuario($id, $nombre){
        try {
            $sql = "UPDATE {$this->table} SET nombre=:nombre WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar el tipo de usuario";
        }
    }

    public function deleteTipoUsuario($id){
        try {
            $sql = "DELETE FROM {$this->table} WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el tipo de usuario";
        }
    }
}